@extends('main')


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $review->title }}</h1>
            <p>{{ $review->body }}</p>
            <hr>
            <p>Posted In: {{ $review->title()->genre()->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($review->comments() as $comment)
                <div class="comment">
                    <p><strong>Name:</strong> {{ $comment->name }}</p>
                    <p><strong>Comment:</strong><br/>{{ $comment->comment }}</p><br>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
<<<<<<< HEAD
            {{ Form::open(['route' => ['comments.store', $review->id], 'method' => 'POST']) }}

            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', "Name:") }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment', "Comment:") }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                    {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                </div>
            </div>

            {{ Form::close() }}
=======
            <form action="" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input id="name" type="text" >
                    </div>

                    <div class="col-md-12">
                        <label for="comment">Comment</label>
                        <input id="comment" type="text" >
                        <button type="Submit">Submit</button>
                    </div>
                </div>
            </form>
>>>>>>> main
        </div>
    </div>
@endsection

