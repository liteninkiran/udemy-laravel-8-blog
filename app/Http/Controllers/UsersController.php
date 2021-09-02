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

    public function home() {
        $users = User::all();
        return view('welcome', compact('users'));
    }

    public function user($id) {
        $user = User::find($id);
        return view('user', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id) {
        $user = User::find($id);
        $user->update($request->all());
        return redirect('/');
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }

}
