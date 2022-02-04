<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10); 
        return view ('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view ('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([ 
            'title' => ['required', 'unique:posts'],
            'sub_title' => ['nullable'],
            'image' => ['nullable', 'image', 'max:100'],
            'text' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);
        if($request->file('image')){

            $storage_image = Storage::put('post_images', $request->file('image'));
            $validated['image'] = $storage_image;
        }
 
        $post = Post::create($validated);

        // Redirect
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Auth::id() === $post->user_id) { 
            return view('admin.posts.edit', compact('post'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(Auth::id() === $post->user_id){
            $validated = $request->validate([
                'title' => [
                    'required', 
                    Rule::unique('posts')->ignore($post->id), 'max:100',
                ],
                'sub_title' => ['nullable'],
                'image' => ['nullable', 'image', 'max:100'],
                'text' => ['nullable'],
            ]);

            if($request->file('image')){

                Storage::delete($post->image);    
                $storage_image = $request->file('image')->save('post_images');
                $validated['image'] = $storage_image;
        }

        $validated['slug'] = Str::slug($validated['title']);

        // Salvataggio
        $post->update($validated);

        // Redirect
        return redirect()->route('admin.posts.index')->with('message', 'Post aggiornato');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if(Auth::id() === $post->user_id){
            $post->delete();
            return redirect()->route('admin.posts.index')->with('message', 'Post rimosso');
        } else{
            abort(403);
        }
    }
}
