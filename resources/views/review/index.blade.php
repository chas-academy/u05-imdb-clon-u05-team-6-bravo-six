<ul>
@foreach ($reviews as $review)
<li>{{$review->body}}<span>Rating: {{$review->rating}} </span></li>
@endforeach
</ul>