<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //        $user = Auth::user();
//        $posts = Post::paginate(5);
//        $posts = new Collection();
//        $user->friends->each(function ($friend) use (&$posts) {
//            $posts = $posts->merge($friend->posts);
//        });
//        $posts = $posts->merge($user->posts);
//        $posts = \App\Models\Post::whereIn('id', $posts->pluck('id'))->latest()->paginate(10);

//        dd(Auth::user()->posts->where('id','=','6'));
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required'
        ]);
//        dd($data);
        $post = Auth::user()->posts()->create($data);
        $posts = Post::all()->sortByDesc('created_at');

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}
