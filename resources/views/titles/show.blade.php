@extends('layouts.app')

@section('content')

<ul>
    <li>{{$title->id}}<span> with the name: {{$title->title}} </span></li>
    <a href="{{action([App\Http\Controllers\TitleController::class, 'reviews'], ['title'=>$title->id])}}">Reviews</a>
    {{--write code for making column --}}
    <form action="{{action([\App\Http\Controllers\ReviewController::class, 'store'])}}" method="POST"> 
                @csrf
                <input type="hidden" name="title_id" value="{{$title->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" >
                        <label for="body">Body</label>
                        <input name="body" id="body" type="text" >
                        <button type="Submit">Submit</button>
                    </div>
                </div>
    </form>
   
 </ul>

@endsection