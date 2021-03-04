<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload', ['user_id' => request('user_id')]);
    }

    public function uploadFile(Request $request)
    {
        // Image::make($request->file)->save('storage.jpg');
        $path = $request->file->store('storage');
        // save path in DB
        $user = User::find($request->user_id);
        $user->img_url = $path;
        $user->save();
        return redirect()->action([UserController::class, 'show'], ['user' => $user]);
    }

}
