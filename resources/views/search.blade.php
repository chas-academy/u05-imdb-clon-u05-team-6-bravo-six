@extends('layouts.app')

@section('content')
<style>
.fa-plus {
        background-color: rgb(136, 202, 136);
        right: 0;
        top: 0;
        font-size: 2em;
        position: absolute;
    }
    .title-card {
        position: relative;
    }
    .dropdown_watchlists {
        /* display: none; */
    }
</style>
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($titles as $title)
                <x-title-card :title="$title"></x-title-card>
            @endforeach
        </div>
    </div>
@endsection