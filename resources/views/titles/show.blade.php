@extends('layouts.app')

@section('content')

<ul>
    
        <img class="col-xl-3 col-lg-3" src="https://www.themoviedb.org/t/p/w1280/oHj6guMrLfQcBzo3uxwBJc8Y736.jpg"/>
    
    <div class="col-lg-9 col-xl-9 float-right mt-xl-5">
        <h1>{{$title->title}}</h1>
        <hr/>
        <p class="text-muted">{{$title->description}}</p>
    </div>
    {{--<a href="{{action([\App\Http\Controllers\TitleController::class, 'reviews'], ['title'=>$title->id])}}">Reviews</a>
    write code for making column --}}
    <form action="{{action([\App\Http\Controllers\ReviewController::class, 'store'])}}" method="POST"> 
                @csrf
                <input type="hidden" name="title_id" value="{{$title->id}}">
                @if (Auth::check()) 
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div class="col-md-12">
                    <label for="rating">Click for rating</label>
                        <select id="rating" name="rating" size="5">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" >
                        <label for="body">Body</label>
                        <input name="body" id="body" type="text" >
                        <button type="Submit">Submit</button>
                    </div>
                </div>
    </form>
    @else 
    <p>You need to log in to make a review!</p>
    @endif

 </ul>

@endsection