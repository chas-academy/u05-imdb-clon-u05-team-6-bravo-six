@extends('layouts.app')

@section('content')
{{-- <ul> --}}
    @foreach ($watchlistItems as $item)
    {{$item->title_id}} 
    @endforeach
{{-- <li>{{$title->id}}<span> with the name: {{$title->title}} </span></li>
<a href="{{action([App\Http\Controllers\TitleController::class, 'reviews'], ['title'=>$title->id])}}">Reviews</a>
</ul> --}}
@endsection