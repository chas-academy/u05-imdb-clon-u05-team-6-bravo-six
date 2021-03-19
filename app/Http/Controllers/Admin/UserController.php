<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



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
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->user;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->action([UserController::class, 'index']);
    }


    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }


    public function edit($id)
    {

    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->user_admin == false) {
            $user->user_admin = $request->user()->user_admin ? 1 : 0;
        } else {
            $user->user_admin = $request->user_admin ? 1 : 0;
        }
        // $user->user_admin = $request->user_admin;
        $user->save();
        return redirect()->back();
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->action([UserController::class, 'index']);
    }


}
