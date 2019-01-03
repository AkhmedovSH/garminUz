(function(){
    var client = algoliasearch('PX53DCKYQ3', '1c21d9871709d5b99187dfc72d2f16c7');
    var index = client.initIndex('books');
    var enterPressed = false;
//initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'name',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function(suggestion) {
                    const markup = `                   
                        <div class="algolia-result">
                            <span>
                            <img src="${window.location.origin}/uploads/books/${suggestion.image}"  alt="image" class="algolia-thumb">
                            ${suggestion._highlightResult.title.value}</span>
                        </div>
                         <div class="algolia-detils">
                          <span>ISBN:${suggestion._highlightResult.isbn.value}</span>
                          </div>
                    `;
                    return markup;
                    //return '<span>' +
                    //    suggestion._highlightResult.title.value + '</span><span>' +
                    //    suggestion.created_at.value + '</span>';
                },
                empty: function(result){
                    return 'Sorry, did not find any result"' + result.query + '"';
                }
            }
        }).on('autocomplete:selected', function(event, suggestion, dataset) {
        window.location.href = window.location.origin + '/book/' + suggestion.slug;
        //enterPressed = true;
    });
})();

/*.on('keyup', function(event, suggestion){
            if(event.keyCode == 13 && !enterPressed){
                window.location.href = window.location.origin + '/post/' + suggestion.slug;
            }
    });*/