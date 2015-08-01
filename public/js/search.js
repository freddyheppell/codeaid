// REPLACE WITH YOUR OWN VALUES
var APPLICATION_ID = '0FZC7ZT3MM';
var SEARCH_ONLY_API_KEY = 'e1a5fd7736ece11108e4191faa555883';
var INDEX_NAME = 'snipdev';
var HITS_PER_PAGE = 100;
// END REPLACE

// DOM binding
var $inputField = $('#q');
var $hits = $('#hits');

// Templates binding
var hitTemplate = Hogan.compile($('#hit-template').text());


// Client initialization
var algolia = algoliasearch(APPLICATION_ID, SEARCH_ONLY_API_KEY);

// Helper initialization
var params = {
    hitsPerPage: HITS_PER_PAGE
};
var helper = algoliasearchHelper(algolia, INDEX_NAME, params);


function renderHits(content) {
    var hitsHtml = '';
    for (var i = 0; i < content.hits.length; ++i) {
        snip = content.hits[i];
        hitsHtml += addSnip(snip['name'], snip['content'], snip['id'], snip['language']['slug'], snip['owner'], snip['likeCount'], snip['commentCount'])
    }
    if (content.hits.length === 0) hitsHtml = '<p id="no-hits"><b>Oh Snip!</b> We couldn\'t find any snips, <a href="/s/create">why not create one?</a></p>';
    $hits.html(hitsHtml);
    highlighting();
}


helper.on('result', function(content, state) {
    renderHits(content);
});

$inputField
    .on('keyup', function() {
        var query = $inputField.val();
        helper.setQuery(query).search();
    })
    .focus();

helper.search();