<!DOCTYPE html>
<html>
  <head>
    <title>CodeAid</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://djyhxgczejc94.cloudfront.net/frameworks/bootstrap/3.0.0/themes/white-plum/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="/js/highlight/styles/monokai.css">
  </head>
  
  <body>
    <nav class="navbar navbar-default large-navbar">
      <div class="container-fluid">
        <div class="navbar-left">
          <a class="navbar-brand" href="/"><img alt="CodeAid" src="/img/logo3.png" height="50px"></a>
        </div>
        <div class="navbar-right">
          <a class="navbar-brand btn btn-default" id="new-snip-navbar"href="/s/create">New Snip <i class="fa fa-file-code-o"></i></a>
        </div>
      </div>
    </nav>
    <div class="row">
      <div class="col-md-6">
        <div id="snip">
          <div class="panel panel-default">
            <div class="panel-header snip-title">
              <h3>{{ $snip->name }} <small>By {{ $snip->user->name }} <span class="badge">{{ $snip->language->name }}</span></small></h3>
              {{--<span class="badge"><a href="{{ action('LanguageController@show', $snip->language->id) }}">{{ $snip->language->name }}</a></span>--}}
            </div>
            <pre class="panel-body snip-body {{ $snip->language->slug }}">{{ $snip->content }}</pre>
            <div class="panel-footer snip-ratings">
              @if ($user_vote != null)
              <h4><a href="{{ Request::url() .  '/like' }}" class="btn btn-success" ><i class="fa fa-thumbs-o-up"></i> Unlike <span class="badge">{{ $vote_count }}</span></a></h4>
              @else
                <h4><a href="{{ Request::url() .  '/like' }}" class="btn btn-default" ><i class="fa fa-thumbs-o-up"></i> Like <span class="badge">{{ $vote_count }}</span></a></h4>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-header" id="comments-title"><h3 class="cool-comments-title">Comments</h3></div>
        <div class="panel-body" id="comments-form">
          <div class="panel panel-default">
            <div class="panel-header"><h4 class="cool-comments-title">Add a comment...</h4></div>
            <div class="panel-body">
              <form action="{{ Request::url() }}/comment/create" method="post">
                {!! csrf_field() !!}
              <div class="input-group">
                  <input type="text" name="comment" class="form-control" id="commentInput" placeholder="Your comment...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Submit</button>
                  </span>
              </div>
                </form>
            </div>
          </div>
        </div>
        @foreach ($snip->comments as $comment)
        <div class="well well-sm">
          <h5>{{ $comment->user->name }} </h5><h6>{{ $comment->content }}</h6>
        </div>
        @endforeach
        <div class="panel-body" id="comments-section"></div>
      </div>
      </div>
    </div>
    <div class="footer">
      <p>Made by Freddy and Finnbar</p>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/highlight/highlight.pack.js"></script>
    <script src="/js/snip.js" type="text/javascript"></script>
  </body>
</html>