<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TitleController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        // Image::make($request->file)->save('storage.jpg');
        $path = $request->file->store('storage');
        // save path in DB
        $title = Title::find($request->title_id)->first();
        $title->img_url = $path;
        $title->save();
        return redirect()->action([TitleController::class, 'show'], ['title' => $title]);
    }
}
