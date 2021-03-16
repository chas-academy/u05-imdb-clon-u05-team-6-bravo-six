@extends('layouts.app')
@section('content')
<?php $watchlists = Auth::check() ? Auth::user()->watchlists() : null?>
<div class="row">
@foreach ($titles as $title)
                <x-title-card :title="$title" :watchlists="$watchlists" :moddable="true"></x-title-card>
@endforeach
</div>
@endsection