@extends('main')

@section('title', '| DELETE COMMENT?')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>DELETE THIS COMMENT?</h1>
            <p>
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>Comment:</strong> {{ $comment->comment }}
            </p>
            //Correct action address?
            <form action="{{action(['route' => ['comments.destroy', $comment->review], 'method' => 'DELETE'])}}" >
                @csrf
                <button onsubmit="" class="btn">Delete comment</button>
            </form>

        </div>
    </div>

@endsection
