<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index()
    {
        $sort = (request()->get('sort')) ? request()->get('sort') : 'id';
        $users = User::orderBy($sort)->paginate(25);
        return view('admin.users.index', ['users' => $users, 'sort' => $sort]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back();
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->action([UserController::class, 'index']);
    }
}