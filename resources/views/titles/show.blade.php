@extends('layouts.app')

@section('content')
<ul>
<li>{{$title->id}}<span> with the name: {{$title->title}} </span></li>
</ul>
@endsection