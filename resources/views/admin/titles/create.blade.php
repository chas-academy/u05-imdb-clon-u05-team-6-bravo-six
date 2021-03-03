@extends('layouts.admin')
@section('content')
    <style>
        .card{
            display: block;
            position: relative;
            cursor: pointer;
            min-height: 400px;
            height: auto;
            width: auto;
            user-select: none;
        }
        .hidden-radio{
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
            z-index: 2;
        }
        .span-image{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-repeat: no-repeat;
        }
        .row {
            list-style-type: none;
        }
    </style>
    <form method="POST" action=" {{action([\App\Http\Controllers\Admin\TitleController::class, 'store'])}} ">
        @csrf
        <div class="form-group"><label for="">Title (name)</label><input type="text" name="title" class="form-control"></div>
        <div class="form-group">
            <label>Enter a description of the title here</label>
            <textarea name="description" class="form-control" ></textarea>
        </div>
        <div class="form-group">
            Select a primary genre

        <x-primary-genre-select :selected="null"></x-primary-genre-select>
        </div>
        
        <div class="container">
            Select any number of secondary genres
           @foreach($genres as $genre)
              <div class="form-check">
              <input  class="form-check-input" id="{{$genre->id}}" type="checkbox" name="{{$genre->id}}">
              <label class="form-check-label" for="{{$genre->id}}">{{$genre->name}}</label>
              </div>
           @endforeach
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    
        <x-api-search-div title="Search for titles in the OMDB, for adding a image linked to the title"></x-api-search-div>
</form>
@endsection