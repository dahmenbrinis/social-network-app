<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $user = Auth::user();
//        $friends_suggestion = new Collection();
//        $user->friends->whereNotIn('id', $user)->each(function ($friend) use ($user, &$friends_suggestion) {
//            $friends_suggestion = $friends_suggestion->merge(
//                $friend->friends
//            );
//        })->whereNotIn('id', $user->friends->pluck('id'));
//
//        $users = User::
//        whereIn('id', $friends_suggestion->pluck('id'))
//            ->paginate(16);
        return view('friends.index');
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
        $user_id = $request->validate([
            'user' => 'required'
        ])['user'];
        $user = User::findOrFail($user_id);
        $user->friends()->syncWithoutDetaching(Auth::user());
        Auth::user()->friends()->syncWithoutDetaching($user);
        return redirect(route('friend.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
