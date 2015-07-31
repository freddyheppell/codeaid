
var highlighting = function() {
    $('pre').each(function(i, block) {
        hljs.highlightBlock(block);
    });
};


$(document).ready(function() {
    highlighting();
});

var counter = 0;

clearAllSnips = function() { //removes from the HTML, not the database!
    $("#snips").html("");
};

//<a href="/s/@{{ id }}">
//    <div style="display: block;" class="panel panel-default" id="snip-0">
//    <div class="panel-header snip-title">
//    <h3>@{{ name }} <small>By @{{ owner }} <span class="badge"></span> <span class="badge"><i class="fa fa-thumbs-o-up"></i> @{{ likeCount }}</span></small></h3>
//</div>
//<pre class="panel-body snip-body">@{{ content }}</pre>
//<div class="panel-footer snip-ratings">
//    <h5><i class="fa fa-comment"></i> @{{ commentCount }} comments</h5>
//</div>
//</div>
//</a>

addSnip = function(title,content,id,slug, owner, likeCount, commentCount) {
    return "<a href=\"/s/" + id + "\"><div style=\"display:block;\" class=\"panel panel-default\" id=\"snip-" + id + "\"><div class=\"panel-header snip-title\">" +
        "<h3>" + title + " <small>By " + owner + "<span class=\"badge\"></span> <span class=\"badge\"><i class=\"fa fa-thumbs-o-up\"></i> " + likeCount + "</span></small></h3></div>" +
        "<pre class=\"panel-body snip-body language-" + slug + "\">" + content + "</pre><div class=\"panel-footer snip-ratings\"><h5><i class=\"fa fa-comment\"></i> " + commentCount + " comments</h5></div></div></div>";


};