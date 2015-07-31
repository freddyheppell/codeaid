<!DOCTYPE html>

<html>
  
  <head>
    <title>CodeAid</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="//djyhxgczejc94.cloudfront.net/frameworks/bootstrap/3.0.0/themes/white-plum/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="/js/highlight/styles/monokai.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>
  
  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-left">
            <a class="navbar-brand"><img alt="CodeAid" src="/img/logo3.png" height="50px"></a>
          </div>
          <div class="navbar-right">
            <a id="accounts"></a>
            <a class="navbar-brand btn btn-default" id="new-snip-navbar" href="/s/create">New Snip <i class="fa fa-file-code-o"></i></a>
            <a class="btn btn-default navbar-brand" class="btn btn-primary" id="helpbtn" data-toggle="modal" data-target="#help">Help!</a>
          </div>
        </div>
      </nav>
      <div class="jumbotron">
        <h1 class="question">What are you making?<br></h1>
        <form id="search-form" class="form-inline" role="form">
          <input type="text" id="q" class="form-control search-form" autocorrect="off" autocomplete="off" spellcheck="false" placeholder="Search for functions, language...">
        </form>
      </div>
      <div id="hits">

      </div>
      <div class="footer">
        <p>Made by Freddy and Finnbar. MIT Licensed.</p>
      </div>
    </div>
    <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Help!</h4>
          </div>
          <div class="modal-body">
            <div style="text-align: center;"><img src="/img/logo2.png" width="60%" /></div>
            <br />
            <br />
            Hello!
            <br />
            <br />
            Welcome to CodeAid!
            <br />
            <br />
            This is a site for publishing Snips, small sections of code that may be able to help you code larger things! You can search through these with the large search bar on this page, and if you like a particular Snip, you can click on that Snip to have a look at all of its comments, and to upvote it! Or downvote it if you don't like it, but you better have a good reason for it.
            <br />
            <br />
            If you want to create a Snip of your own (once you've logged in), click New Snip to begin!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/highlight/highlight.pack.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="/js/index.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="//cdn.jsdelivr.net/algoliasearch.helper/2/algoliasearch.helper.min.js"></script>
    <script src="//cdn.jsdelivr.net/hogan.js/3.0.2/hogan.common.js"></script>
    <script src="/js/search.js"></script>

    <script type="text/template" id="hit-template">
      <a href="/s/@{{ id }}">
        <div style="display: block;" class="panel panel-default" id="snip-0">
          <div class="panel-header snip-title">
            <h3>@{{ name }} <small>By @{{ owner }} <span class="badge"></span> <span class="badge"><i class="fa fa-thumbs-o-up"></i> @{{ likeCount }}</span></small></h3>
          </div>
          <pre class="panel-body snip-body">@{{ content }}</pre>
          <div class="panel-footer snip-ratings">
            <h5><i class="fa fa-comment"></i> @{{ commentCount }} comments</h5>
          </div>
        </div>
      </a>
    </script>
  </body>
</html>