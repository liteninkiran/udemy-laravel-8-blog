<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class AdminController extends Controller {

    public function home() {
        $postsCount = Post::all()->count();
        $usersCount = User::all()->count();
        $categoriesCount = Category::all()->count();
        $recentPosts = Post::latest()->take(5)->get();
        $recentCategories = Category::latest()->take(5)->get();

        return view('admin.home', compact('postsCount', 'usersCount', 'categoriesCount', 'recentPosts', 'recentCategories'));
    }
}
