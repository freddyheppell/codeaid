var highlighting = function() {
    $('pre').each(function(i, block) {
        hljs.highlightBlock(block);
    });
};



$(document).ready(function () {
    //addSingleSnip("Snip 1","int setup() {\n\treturn 1;\n}",10,[["Person A","MY GOODNESS THE FEELS"],["Person B","WHAT ARE YOU SAYING PERSON A"],["Person C","WHY ARE YOU CAPS unlocked please stop shouting."]],"","cpp");
    highlighting();
    console.log('thing is go');
    isLoggedIn();
});

addSingleSnip = function(title,content,score,comments,id,langname) {
    var lang = '<span class="badge">'+langname+'</span><br /><br />';
    $("#snip").html('<div class="panel panel-default"><div class="panel-header snip-title"><h3>'+title+'</h3>'+lang+'</div><pre class="panel-body snip-body">'+content+'</pre><div class="panel-footer snip-ratings"><h4><span class="label label-success btn btn-default"><i class="fa fa-plus"></i></span> '+score+' <span class="label label-danger btn btn-default"><i class="fa fa-minus"></i></span></h4></div></div>' + $("#snip").html());
    var commentings = "";
    for (var i = comments.length - 1; i >= 0; i--) {
        commentings += '<div class="well well-sm"><h5><strong>' + comments[i][0] + ':</strong></h5><h6>' + comments[i][1] + '</h6></div>';
    };
    $("#comments-section").html(commentings);
    highlighting();
}

