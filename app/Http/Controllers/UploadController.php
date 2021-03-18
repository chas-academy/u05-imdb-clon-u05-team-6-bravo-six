<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload', ['id' => request('id')]);
    }

    public function uploadFile(Request $request)
    {
        if(Storage::exists($path)){
            Storage::delete($path);
        }
        $path = $request->file->store('storage');

        // save path in DB
        $user = User::find($request->id);
        $user->img_url = $path;
        $user->save();
        return redirect()->action([UserController::class, 'show'], ['user' => $user]);
    }

}
