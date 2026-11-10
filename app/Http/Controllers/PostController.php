<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * index
     * 
     * @return void
     */

    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * create
     * 
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request 
     * @return void
     */

    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:10']
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('posts',$image->hashName(), 'public');

        // create post
        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($post) {
            // redirect to index with success
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            // redirect to index with error
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * show
     *
     * @param mixed $id 
     * @return void
     */
    
    public function show($id)
    {
        // get post by ID
        $post = Post::find($id);

        // return view
        return view('posts.show', compact('post'));

    }

    /**
     * edit
     * 
     * @param mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * update
     * 
     * @param mixed $request
     * @param mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        // validate form
        $request -> validate([
            'image' => ['image', 'mimes:jpeg,png,jpg, gif,svg', 'max:2048'],
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:10']
        ]);

        // check if image is uploaded
        if ($request->hasFile('image')) {

            // upload new image
            $image = $request->file('image');
            $image->storeAs('posts', $image->hashName(), 'public');

            // delete old image
            Storage::delete('public/posts'.$post->image);

            // update post with new image
            $post->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } else {
            
            // update post without image
            $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        if ($post) {
            // redirect to index with success
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            // redirect to index with error
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Diupdate']);
        }
    }
}
