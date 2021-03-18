@extends('layouts.app')

@section('content')
    <div class="row">
    @foreach (\App\Models\Genre::all() as $genre)
        <button class="btn btn-sm m-1 filter" data-id="{{$genre->id}}">{{$genre->name}}</button>
    @endforeach
    </div>
<div class="navbar-nav ml-auto justify-content-end">
            <form class="form-inline my-2 my-lg-0" action="/search" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search for..." 
                        @if(request('q'))
                        value="{{request('q')}}"
                        @endif
                        name="q">
                        <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                    </div>
                </form>
            </div>
@csrf
<?php
$watchlists = Auth::check() ? Auth::user()->watchlists() : null?>
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($titles as $title)
            <div class="@foreach($title->genres()->get() as $genre) {{$genre->id}} @endforeach movie">
                <x-title-card :title="$title" :watchlists="$watchlists" :moddable="true"></x-title-card>
            </div>
                @endforeach
        </div>
        <x-navigation-aside></x-navigation-aside>
        
        {{-- <div class="row">{{$titles->appends(['q' => request('q')])->links()}}</div> --}}
    </div>

        <script>
const arr = [];
            $(() => {
                if($('.filter') && $('.movie')){
                // 
                $('.filter').on('click', function (){
                    $(this).toggleClass('selected-filter')
                    const id = this.dataset.id;
                    $('.movie').removeClass('hidden')
                    if (arr.indexOf(id) !== -1){
                        arr.splice(arr.indexOf(id), 1); 
                    } else {
                        arr.push(id);
                    }
                    if (arr.length > 0) $('.movie:not(.'+arr.join('.')+')').addClass('hidden')
                })
                }
            })
        </script>
        <style>
            .hidden{
                display: none;
            }
            button.filter{
                border: 1.5px solid black;
            }
            button.selected-filter{
                
                background-color: rgb(151, 152, 223) !important;
            }
        </style>
@endsection