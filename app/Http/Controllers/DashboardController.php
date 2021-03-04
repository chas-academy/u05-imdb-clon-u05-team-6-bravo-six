<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(User $user)
    {
        $reviews = collect(Auth::user()->reviews());
        $comments = collect(Auth::user()->comments());
        $sortedData = $reviews->merge($comments)->take(10)->sortByDesc('updated_at');
        return view(
            'dashboard',
            [
                'reviews' => Auth::user()->reviews(),
                'comments' => Auth::user()->comments(),
                'watchlists' => Auth::user()->watchlists(),
                'sortedData' => $sortedData,
                'user' => $user
            ]
        );
    }
}
