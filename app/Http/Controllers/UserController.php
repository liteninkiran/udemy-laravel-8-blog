<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $trashed = User::onlyTrashed()->get();
        return view('admin.users', compact('users', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User ' . $user->name . ' trashed successfully');
        return redirect('admin/users/index');
    }

    public function promote($id, $promote)
    {
        $user = User::find($id);
        $user->is_admin = $promote;
        $user->save();
        $action = $promote === '1' ? ' promoted ' : ' demoted ';
        session()->flash('message', 'User ' . $user->name . $action . ' successfully');
        return redirect('admin/users/index');
    }

    // Show user's profile
    public function profile()
    {
        // $user = User::find($id);
        return view('admin.profile'); //, compact('user'));
    }

}
