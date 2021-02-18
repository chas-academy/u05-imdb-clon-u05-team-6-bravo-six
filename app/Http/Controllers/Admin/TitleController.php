<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    //
    public function index()
    {
        dd(\App\Models\Title::all());
    }
}
