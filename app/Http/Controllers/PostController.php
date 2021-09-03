<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $trashed = Post::onlyTrashed()->get();
        return view('admin.posts', compact('posts', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->validate(Post::$validationRules, Post::$messages)) {

            $imageName = null;

            // Upload image
            if ($request->has('image')) {
                $image = $request->image;
                $path = 'storage/posts/';
                $imageName = $this->uploadImage($image, $path);
            }

            $post = Post::create($request->all());
            $post->image = $imageName;
            $post->save();
            session()->flash('message', 'Post created successfully');
            return redirect('admin/posts/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin.edit_post', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $imageName = $post->image;

        if ($request->validate(Post::$validationRules, Post::$messages)) {

            // $post->update($request->all());

            // Upload image
            if ($request->has('image')) {
                $image = $request->image;
                $path = 'storage/posts/';
                $imageName = $this->uploadImage($image, $path);
            }

            $post->title = $request->title;
            $post->desc = $request->desc;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->image = $imageName;

            $post->save();

            session()->flash('message', 'Post updated successfully');

            return redirect('admin/posts/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage($image, $path) {
        $imageName = $image->getClientOriginalName();
        $string = Str::random();
        $newName = $string . '_' . time() . '_' . $imageName;
        $image->move($path, $newName);

        return $newName;
    }
}
