require('./bootstrap');

require('alpinejs');
$(() => {
    if ($('#search-results')) {
        const baseUrl = "http://www.omdbapi.com/?apikey=3367eb14&";
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

                const widget = $(this)
                this.element.on('click', function () {
                    if ($(this).find('input').is(':checked')) {
                        $(this).css('border', '5px solid blue')
                        searchResults.find('.ajaxItem').each(function (i) {
                            if (!$(this).find('input').is(':checked')) {
                                $(this).css('border', 'none')
                            }
                        })
                    } else console.log('not')
                })
            },
            _destroy: function () {
                this.element.removeClass('ajaxItem').text("").remove();
            }
        })


        async function doRequest(query) {
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
                    // console.log('else')
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
        $('#search-clear').on('click', function () {
            searchResults.empty();
        })
    }
})