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
    .watchlist_listitem.added{
        background-color: green;
    }
    .watchlist_listitem.pending{
        background-color: purple;
    }
</style>
@csrf
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
    <script>
        $(() => {
            $('.watchlist_listitem').on('click', function () {
                //begin animation
                $(this).toggleClass('pending')
                //
                const watchlistId = this.dataset.id;
                const titleId = this.dataset.title;
                fetch('/watchlists/add_title_to_watchlist/' + watchlistId + "/" + titleId, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').attr('content'),
                        }
                }).then(response => response.text()).then(text => {
                    console.log(text)
                    $(this).toggleClass('pending')
                    $(this).toggleClass('added')
                })
            })
        })
        </script>
@endsection