<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        //didn't succed in sending variables defined below, will try later with more test data
        $userData = [
            'watchlists' => Auth::user()->watchlists(),
            'reviews' => Auth::user()->reviews(),
            'comments' => Auth::user()->comments()
        ];
        $userWatchlists = ['watchlists' => Auth::user()->watchlists()];
        $userReviews =['reviews' => Auth::user()->reviews()];
        $userComments = ['comments' => Auth::user()->comments()];

        return view('dashboard', 
        ['reviews' => Auth::user()->reviews()],
        ['watchlists' => Auth::user()->watchlists()],
        ['comments' => Auth::user()->comments()]
        );
    }
}
