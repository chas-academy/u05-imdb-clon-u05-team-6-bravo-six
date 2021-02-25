@extends('layouts.app')

@section('content')

{{-- <ul> --}}

        <img class="col-xl-3 col-lg-3" src="https://www.themoviedb.org/t/p/w1280/oHj6guMrLfQcBzo3uxwBJc8Y736.jpg"/>

    <div class="col-lg-9 col-xl-9 float-right mt-xl-5">
        <h1>{{$title->title}}</h1>
        <hr/>
        <p class="text-muted">{{$title->description}}</p>
    </div>
    {{--<a href="{{action([\App\Http\Controllers\TitleController::class, 'reviews'], ['title'=>$title->id])}}">Reviews</a>
    write code for making column --}}
    <form class="col-lg-9 col-xl-9 float-right" action="{{action([\App\Http\Controllers\ReviewController::class, 'store'])}}" method="POST">
                @csrf
                <input type="hidden" name="title_id" value="{{$title->id}}">
                @if (Auth::check())
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div class="col-md-12">
                    <label for="rating">Click for rating</label>
                        <select id="rating" name="rating" size="5" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" required>
                        <label for="body">Body</label>
                        <input name="body" id="body" type="text" required>
                        <button type="Submit">Submit</button>
                    </div>
                </div>
    </form>
    @else
    <p>You need to log in to make a review!</p>
    @endif
    @foreach ($reviews as $review)
    <div class="container float-left">
            <div class="col-lg-3 col-xl-3 float-left">
                {{-- <p><b>Rating: {{$review->rating}} </b></p> --}}
                @for($i=0; $i < $review->rating; $i++)
                    <img class="float-right" style="width: 15%; margin-right: 2%"src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/dbe21d7e-5f33-4784-9f21-218c9a3b9b8a/d74335n-ed3a5286-29c7-4ac4-901c-4c226eca5d43.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvZGJlMjFkN2UtNWYzMy00Nzg0LTlmMjEtMjE4YzlhM2I5YjhhXC9kNzQzMzVuLWVkM2E1Mjg2LTI5YzctNGFjNC05MDFjLTRjMjI2ZWNhNWQ0My5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.DSmPWj593mwpaUhvhevqkQ4Gw1tuaM8QREKj613031I"/>
                @endfor
            </div>
            <div class="card col-lg-9 col-xl-9 float-right">
                <h3><a class="float-left" href=" {{action([App\Http\Controllers\ReviewController::class, 'show'], ['review' => $review->id])}} ">{{$review->title}}</a>
                    <small class="text-muted float-right">{{$review->user()->name}}</small>
                </h3>
            <span>{{$review->body}}</span>
            </div>
        <br/>
        </div>
    @endforeach

 {{-- </ul> --}}

@endsection