<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload', ['id' => request('id')]);
    }

    public function uploadFile(Request $request, User $user)
    {
        $path = $request->img_url;
        if($path !== null) {
            Storage::delete($path);
        }
        $path = $request->file->store('storage');

        // save path in DB
        $user = Auth::user();
        $user->img_url = $path;
        $user->save();
        return redirect()->action([UserController::class, 'show'], ['user' => $user]);
    }

    public function destroy(User $user) {

        Storage::delete($user->img_url);
        $user->img_url = null;
        $user->save();

        return redirect()->back();
    }

}
