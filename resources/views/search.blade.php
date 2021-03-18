@extends('layouts.app')

@section('content')
@csrf
<?php
$watchlists = Auth::check() ? Auth::user()->watchlists() : null?>
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($titles as $title)
                <x-title-card :title="$title" :watchlists="$watchlists" :moddable="true"></x-title-card>
            @endforeach
        </div>
        <x-navigation-aside></x-navigation-aside>
    </div>
        <div class="container">{{$titles->appends(['key' => $key])->links()}}</div>
@endsection