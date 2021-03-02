@extends('layouts.admin')
@section('content')
    <form method="POST" action=" {{action([\App\Http\Controllers\Admin\TitleController::class, 'store'])}} ">
        @csrf
        <div class="form-group"><label for="">Title (name)</label><input type="text" name="title" class="form-control"></div>
        
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
    </form>
    <div class="form-group">
    <label>Search for titles in the OMDB, for adding a image linked to the title</label>
    
    <input id="search-input" class="form-control">
    <span  class=" alert-danger" id="status"></span>
    </div>
    
    <div id="search-results">
    </div>
    <script>
        $(()=> {
            const baseUrl = "http://www.omdbapi.com/?apikey={{env('OMDB_API_KEY')}}&";
            async function doRequest(query) {
                const request = await fetch(`${baseUrl}s=${query}`).then(response => response.json()).then(data => {
                    console.log(data)
                    $('#status').text(data.Error ? data.Error : '');
                })
            }
            $('#search-input').on('keydown', function () {
                const query = $(this).val();
                if (query.length > 1){
                    doRequest(query)
                }
            })
        })
    </script>
@endsection