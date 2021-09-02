<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function userForm() {
        return view('create_user');
    }

    public function store(Request $request) {
        User::create($request->all());
        return redirect('/');
    }
}
