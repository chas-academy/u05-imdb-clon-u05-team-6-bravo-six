<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){
        
        $reviews = collect(Auth::user()->reviews());
        $comments = collect(Auth::user()->comments());

        $sortedData = $reviews->merge($comments)->sortByDesc('updated_at');
        
        return view('dashboard', 
        ['reviews' => Auth::user()->reviews(),
        'comments' => Auth::user()->comments(),
        'watchlists' => Auth::user()->watchlists(),
        'sortedData' => $sortedData]);
        
    }
}
