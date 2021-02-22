@extends('layouts.app')

@section('content')
{{-- <ul> --}}
    @foreach ($watchlistItems as $item)
    <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ['title'=>$item->title_id])}}">
        {{$item->title()->title}} 
    </a>
    @endforeach

@endsection