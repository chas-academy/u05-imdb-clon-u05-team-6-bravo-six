@extends('layouts.app')
@section('content')
Welcome to the site!
 <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <form class="card-body" action="/search" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." name="key">
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
          </span>
            </div>
        </form>
    </div>
@endsection