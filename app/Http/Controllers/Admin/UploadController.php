<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{

    public function uploadFormAdmin()
    {
        return view('admin.upload', ['user_id' => request('user_id')]);
    }

    public function uploadFileAdmin(Request $request, User $user)
    {

        $path = $user->img_url;
        if(Storage::exists($path)) {
            Storage::delete($path);
        }
        $path = $request->file->store('storage');

        // save path in DB
        $user = User::find($request->user_id);
        $user->img_url = $path;
        $user->save();
        return redirect()->action([UserController::class, 'show'], ['user' => $user]);

    }

    // public function destroy(User $user) {
    //     $user->img_url->delete();

    // }

}


