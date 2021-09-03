<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(3);
        $trashed = Category::onlyTrashed()->get();
        return view('admin.categories', compact('categories', 'trashed'));
    }

    /**
     * Display a listing of the soft deleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $categories = Category::all();
        $trashed = Category::onlyTrashed()->paginate(3);
        return view('admin.trashed_categories', compact('categories', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        if ($validated) {
            Category::create($request->all());
            session()->flash('message', 'Category created successfully');
            return redirect('admin/categories');
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
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
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
        $category = Category::find($id);

        $validated = $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        if ($validated) {
            $category->update($request->all());
            session()->flash('message', 'Category ' . $category->title . ' updated successfully');
            return redirect('admin/categories');
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
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category ' . $category->title . ' trashed successfully');
        return redirect('admin/categories');
    }

    public function undelete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        session()->flash('message', 'Category ' . $category->title . ' restored successfully');
        return redirect()->route('admin.categories.trashed');
    }

    public function remove($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $title = $category->title;
        $category->forceDelete();
        session()->flash('message', 'Category ' . $title . ' deleted successfully');
        return redirect()->route('admin.categories.trashed');
    }



}
