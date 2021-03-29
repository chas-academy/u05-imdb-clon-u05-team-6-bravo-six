require('./bootstrap');

require('alpinejs');
$(() => {


    // this is the code for filtering genres on search results
    if ($('.filter') && $('.movie')) {
        const arrGenres = [];
        // 
        $('.filter').on('click', function () {
            $(this).toggleClass('selected-filter')
            const id = this.dataset.id;
            $('.movie').removeClass('hidden')
            if (arrGenres.indexOf(id) !== -1) {
                arrGenres.splice(arrGenres.indexOf(id), 1);
            } else {
                arrGenres.push(id);
            }
            if (arrGenres.length > 0) $('.movie:not(.' + arrGenres.join('.') + ')').addClass('hidden')
        })
    }

    // this has to do with ADMIN PANEL! it allows for searching OMDB for images
    if ($('#search-results')) {
        $('.toggles-search').on('click', function (e) {
            e.preventDefault();
            $('#hidden-absolute-container').toggleClass('shown')
        })
        $('#reset-img').on('click', function (e) {
            e.preventDefault();
            $('#title-image-update').attr('src', $('#original-img-address').text())
            $('#search-results').empty();
            $('#hidden-absolute-container').removeClass('shown')
        })
        const baseUrl = "https://www.omdbapi.com/?apikey=3367eb14&";
        const searchResults = $('#search-results')
        //this is meant to be a widget to represent each search result.
        $.widget('u05.ajaxItem', {
            options: {
                title: "default",
                src: "default_src",
                imdbID: "0"
            },
            _create: function () {

                const title = $(`<h5></h5>`).text(this.options.title)
                const parent = $('<div class="card"></div>')
                const input = $(`<input type="radio" class="hidden-radio" name="src" value="${this.options.src}">`)
                const image = $(`<span class="span-image" style="background-image:url('${this.options.src}'); "></span>`)
                this.element.addClass('ajaxItem col-md-4').append(title, parent.append(image, input))
                const widget = this
                this.element.on('click', function () {

                    //safeguard, check if radio button has worked
                    if ($(this).find('input').is(':checked')) {

                        //this is only for the update-page. checks if there is an element with title-image
                        if (undefined !== $('#title-image-update')) {
                            $('#title-image-update').attr('src', widget.options.src)
                        }
                        $(this).css('border', '5px solid blue')
                        searchResults.find('.ajaxItem').each(function (i) {
                            if (!$(this).find('input').is(':checked')) {
                                $(this).css('border', 'none')
                            }
                        })
                    }
                })
            },
            _destroy: function () {
                this.element.removeClass('ajaxItem').text("").remove();
            }
        })


        async function doRequest(query) {
            console.log(baseUrl);
            const request = await fetch(`${baseUrl}s=${query}`).then(response => response.json()).then(data => {
                $('#status').text(data.Error ? data.Error : '');
                if (data.Search) {
                    searchResults.empty()
                    const arr = data.Search.filter(res => res.Poster !== 'N/A')
                    // console.log('search true')
                    const chunk = 3;
                    for (let i = 0; i <= arr.length; i += chunk) {
                        const tempArr = arr.slice(i, i + chunk)
                        const row = $('<ul class="row"></ul>')
                        tempArr.forEach(item => $('<li></li>').ajaxItem({
                            title: item.Title,
                            src: item.Poster,
                            imdbID: item.imdbID
                        }).appendTo(row))
                        row.appendTo(searchResults)
                    }
                } else {
                    searchResults.empty();
                }
            })
        }
        $('#search-input').on('keydown', function (e) {
            if (e.keyCode === 13) {
                e.preventDefault();
            }
            const query = $(this).val();
            if (query.length > 1) {
                doRequest(query)
            } else searchResults.empty()
        })

        // $('#search-clear').on('click', function () {
        //     searchResults.empty();
        // })
    }


    // this code enables adding watchlist items on titlecard
    if ($('.watchlist_listitem')) {
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
                if (text.status === 203) {
                    $(this).addClass('added').removeClass('error').find('i').addClass('fas fa-check').removeClass(' fa-spinner fa-spin')
                } else if (text.status === 205) {
                    $(this).removeClass('added', 'error').find('i').removeClass(' fa-check fa-spinner fa-spin')
                } else {
                    $(this).addClass('error').removeClass('added').find('i').removeClass(' fa-check fa-spinner fa-spin')
                }
                $(this).toggleClass('pending')

            }).catch(err => console.log(error))
        })
    }
    if ($('#carouselExampleSlides') !== undefined) {
        $('#carouselExampleSlides').carousel();
    }
})
