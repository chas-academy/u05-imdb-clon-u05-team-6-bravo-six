@extends('layouts.app')


@section('content')
    <img class="col-xl-3 col-lg-3 col-sm-6 col-xs-6" src="
    
    @if($review->title()->img_url !== null)
   {{$review->title()->img_url}}
@else
https://i.pinimg.com/564x/2b/55/06/2b55061c90ebcda12a3aedbbb00bbaf5.jpg
@endif
 
    
    
    "/>
    <div class="col-lg-9 col-xl-9 float-right mt-xl-5 col-sm-6 col-xs-6">
        <div class="col-md-8 col-md-offset-2">
            <small>Review by {{$review->user()->name}}</small>
                <h1>{{ $review->title }}</h1>
            
            <p>{{ $review->body }}</p>
            @if(!Auth::guest())
                @if (Auth::id() == $review->user_id)
                    <a href="{{action([App\Http\Controllers\ReviewController::class, 'edit'], ['review' => $review->id])}}" class="text-muted float-right">Edit</a>
                @endif
            @endif
            <hr>
            <p>Posted on:<a href="{{action([App\Http\Controllers\TitleController::class, 'show'], ["title"=>$review->title_id])}}"> {{ $review->title()->title}}</a></p>
        </div>
    </div>
    <div id="backend-comments" style="margin-top: 50px;">
        <h3>Comments: <small>{{ $review->comments()->count() }} total</small></h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>User name</th>
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
                            @if (Auth::id()  == $comment->user_id)
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn  btn-success">Edit</a>
                                <form method="POST" action="{{route('comments.destroy', $comment->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
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
           <form action=" {{action([\App\Http\Controllers\CommentController::class, 'store'])}} " method="POST">
                @csrf
                <input type="hidden" name="review_id" value="{{$review->id}}">
               <div class="form-group">
                   <label for="comment">Write your comment here</label>
                   <textarea class="form-control" name="comment" id="comment" required></textarea>
               </div>
                <div>
                        <button class="btn btn-primary" type="Submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
