<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TitleController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {

        $path = $request->file->store('public');
        //save path in DB
        $title = Title::find($request->title_id)->first();
        $title->img_url = $path;
        $title->save();
        return redirect()->action([TitleController::class, 'show'], ['title' => $title]);
    }
}
