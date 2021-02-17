<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Models\Title;

class DashboardController extends Controller
{
    public function index(){
        //didn't succed in sending variables defined below to view w/o error, will try later with more test data
        $userData = [ //supposed to later be used to show recent activity, sorted by timestamp. Will this solution work, i honestly don't know
            'watchlists' => Auth::user()->watchlists(),
            'reviews' => Auth::user()->reviews(),
            'comments' => Auth::user()->comments()
        ];
        $userWatchlists = ['watchlists' => Auth::user()->watchlists()]; //used to show watchlists
        $userReviews =['reviews' => Auth::user()->reviews()]; //used to show reviews
        $userComments = ['comments' => Auth::user()->comments()]; //used to show comments

        

        return view('dashboard', 
        ['reviews' => Auth::user()->reviews()],
        ['comments' => Auth::user()->comments()],
        ['watchlists' => Auth::user()->watchlists()]
        //,['titles' => Title::all()]
        
        
        );
    }
}
