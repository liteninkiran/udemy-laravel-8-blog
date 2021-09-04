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
     * Display a listing of the soft deleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::all();
        $trashed = Post::onlyTrashed()->paginate(10);
        return view('admin.trashed_posts', compact('posts', 'trashed'));
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
        $post = Post::find($id);
        $post->delete();
        session()->flash('message', 'Post ' . $post->title . ' trashed successfully');
        return redirect('admin/posts/index');
    }

    public function uploadImage($image, $path) {
        $imageName = $image->getClientOriginalName();
        $string = Str::random();
        $newName = $string . '_' . time() . '_' . $imageName;
        $image->move($path, $newName);

        return $newName;
    }

    public function undelete($id) {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();
        session()->flash('message', 'Post ' . $post->title . ' restored successfully');
        return redirect()->route('admin.posts.trashed');
    }

    public function remove($id) {
        $post = Post::onlyTrashed()->find($id);
        $title = $post->title;
        $post->forceDelete();
        session()->flash('message', 'Post ' . $title . ' deleted successfully');
        return redirect()->route('admin.posts.trashed');
    }

    public function search(Request $request) {
        $search = $request->search;
        $posts = Post::query()->where('title', 'LIKE', "%{$search}%")->paginate(10);
        $trashed = Post::onlyTrashed()->where('title', 'LIKE', "%{$search}%")->paginate(10);

        return view('admin.searches', compact('posts', 'trashed'));
    }
}
