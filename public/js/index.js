
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

//addSnip = function(title,content,score,comments,id,langname,above) {
//    var lang = '<span class="badge">'+langname+'</span><br />';
//    var score = "<h4>" + score + " points</h4>";
//    var ratings = "<div class='well well-sm'><h5>"+comments[comments.length-1][0]+": </h5><h6>"+comments[comments.length-1][1]+"</h6></div>";
//    if(comments.length > 1) {
//        ratings += "<div><h5>...and "+(comments.length-1)+" other comment";
//        if(comments.length > 2) {
//            ratings += "s.</h5></div>";
//        } else {
//            ratings += ".</h5></div>"
//        }
//    }
//    if(above) {
//        $("#snips").html('<a href="result.html?id='+id+'"><div class="panel panel-default" id="snip-'+counter+'"><div class="panel-header snip-title"><h3>'+title+'</h3>'+lang+'<br /></div><pre class="panel-body snip-body '+langname+'">'+content+'</pre><div class="panel-footer snip-ratings">'+score+ratings+'</div></div></a>' + $("#snips").html());
//    } else {
//        $("#snips").html($("#snips").html()+'<a href="result.html?id='+id+'"><div class="panel panel-default" id="snip-'+counter+'"><div class="panel-header snip-title"><h3>'+title+'</h3>'+lang+'<br /></div><pre class="panel-body snip-body">'+content+'</pre><div class="panel-footer snip-ratings">'+score+ratings+'</div></div></a>');
//    }
//    $("#snip-"+counter).hide();
//    $("#snip-"+counter).fadeIn(1000, function(){});
//    highlighting();
//    counter += 1;
//};