@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$review->title_id])}}">
                <h1>{{ $review->title()->title }}</h1>
            </a>
            <p>{{ $review->body }}</p>
            @if(!Auth::guest())
                @if (Auth::id() == $review->user_id)
                    <a href="{{action([App\Http\Controllers\ReviewController::class, 'edit'], ['review' => $review->id])}}" class="text-muted float-right">Edit</a>
                @endif
            @endif
            <hr>
            <p>Posted In: {{ $review->title()->genre()->name }}</p>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($review->comments() as $comment)
                <div class="comment">
                    <p><strong>Name:</strong> {{ $comment->name }}</p>
                    <p><strong>Comment:</strong><br/>{{ $comment->body }}</p><br>
                </div>
            @endforeach
        </div>
    </div> --}}


    <div id="backend-comments" style="margin-top: 50px;">
        <h3>Comments <small>{{ $review->comments()->count() }} total</small></h3>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th width="70px"></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($review->comments() as $comment)
                <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>
                        @if(!Auth::guest())
                            @if (Auth::id()  == $review->user_id)
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn primary">Edit<span class="glyphicon glyphicon-pencil"></span></a>
                                <form method="POST" action="{{route('comments.destroy', $comment->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">Delete<span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
            {{-- no worky --}}
            <form action=" {{action([\App\Http\Controllers\CommentController::class, 'store'])}} " method="POST">
                @csrf
                <input type="hidden" name="review_id" value="{{$review->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <label for="comment">Comment</label>
                        <input name="comment" id="comment" type="text">
                        <button type="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

