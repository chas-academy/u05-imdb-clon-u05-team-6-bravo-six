@extends('layouts.app')

@section('content')
<style>
    .title-card {
        padding: 1em;
    }
    #dropdownMenuButton{
        float: right;
        font-weight: 900;
    }
    .watchlist_listitem{
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .dropdown_watchlists {
        /* display: none; */
    }
    .watchlist_listitem.added{
        background-color: rgba(136, 194, 136, 0.589);
    }
    .watchlist_listitem.pending{
        /* background-color: rgba(138, 127, 138, 0.63); */
    }
    .watchlist_listitem.error{
        background-color: red;
    }
.title-card .col-6 {
padding: 0;
/* display: inline; */
margin: 0;
}
.dropdown-menu .list-unstyled {
padding: 0.5em;
}
.dropdown-menu .list-unstyled li{
/* display: inline; */
margin-bottom: 5px;
padding: 0.3em 0.5em;
}
.dropdown-menu .list-unstyled li.added:hover{
background-color: rgba(136, 194, 136, 0.377);
}
.dropdown-menu .list-unstyled li:hover:not(.added){
background-color: rgba(179, 179, 179, 0.377);
}
.title-card-wrapper {
margin:0.5em 0;
}
</style>
@csrf
<?php $watchlists = Auth::user()->watchlists()?>
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Search Result For:
                <small>{{$key}}</small>
            </h1>
            @foreach ($titles as $title)
                <x-title-card :title="$title" :watchlists="$watchlists"></x-title-card>
            @endforeach
        </div>
    </div>
    <script>
        $(() => {
            $('.watchlist_listitem').on('click', function (e) {
                e.stopPropagation();

                //begin animation
                $(this).toggleClass('pending').find('i').removeClass('fas fa-check').addClass('fas fa-spinner fa-spin')
                //
                const watchlistId = this.dataset.id;
                const titleId = this.dataset.title;
                fetch('/watchlists/add_title_to_watchlist/' + watchlistId + "/" + titleId, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').attr('content'),
                        }
                }).then(response => response.json()).then(text => {
                    console.log(text.status)
                    if (text.status === 203){
                        $(this).addClass('added').removeClass('error').find('i').addClass('fas fa-check').removeClass(' fa-spinner fa-spin')
                    } else if (text.status === 205){
                        $(this).removeClass('added', 'error').find('i').removeClass(' fa-check fa-spinner fa-spin')
                } else {
                    $(this).addClass('error').removeClass('added').find('i').removeClass(' fa-check fa-spinner fa-spin')
                }
                    $(this).toggleClass('pending')

                }).catch(err => console.log(error))
            })
        })
        </script>
@endsection