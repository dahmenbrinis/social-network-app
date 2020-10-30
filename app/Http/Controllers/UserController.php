<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Display the profile of the user (brief info , posts ... ) .
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $posts = User::find($id)->posts;
        return view('users.show', compact('posts'), compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        } else return view('errors.not_authorised');
//        Auth::user()->send_message($id, 'this is a message ');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->id == $id) {
            $data = [];
            $data = $this->validator($request);
            $user->update($data);
            $feedback = 'updated successfully ';
            return view('users.edit', compact('feedback'), compact('user'));
        } else return view('errors.not_authorised');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    protected function validator(Request $request)
    {
        return $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($request->input('id'))
            ],
            'password' => ['sometimes', 'required', 'string', 'min:8', 'confirmed'],
            'gender' => ['sometimes', 'required', 'in:0,1'],
            'date_birth' => ['sometimes', 'required', 'date'],
            'state' => ['sometimes', 'string', 'max:8'],
        ]);
    }

}
