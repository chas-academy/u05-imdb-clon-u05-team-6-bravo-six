<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    //
    public function index()
    {
        return view('admin.titles.index', ['titles' => Title::paginate(25)]);
    }
}
