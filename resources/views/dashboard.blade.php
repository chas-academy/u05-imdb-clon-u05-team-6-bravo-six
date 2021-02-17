@extends('layouts.app')
@section('content')
            <div class="container">
                <h1 class="text-center">Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </h1>
                <div class="row">
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12" >
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                    
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                    <div class= "card col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                </div>
            </div> 
            @endsection


