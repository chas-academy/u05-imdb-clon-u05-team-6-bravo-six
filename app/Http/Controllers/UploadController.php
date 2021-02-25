<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->file->store('public');
        return view('upload');
    }


}
