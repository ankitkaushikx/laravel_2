<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
class PostController extends Controller implements HasMiddleware
{

    /**
     * MIddleware
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index','show']),
            ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index',['posts'=> $posts]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        //validate
    $fields =   $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required']
        ]);
        //create post
        Auth::user()->posts()->create($fields);

         return back()->with('success', "Your post was created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify', $post);
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('modify', $post);
        
            //validate
    $fields =   $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required']
        ]);
        //update post
        $post->update($fields);

         return redirect()->route('dashboard')->with('success', "Your post was Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);

        $post->delete();

        //redirect back to dashboard
        return back()->with('delete', 'Your Post Was Deleted!');
    }
}


