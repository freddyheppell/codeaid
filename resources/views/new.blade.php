<!doctype html>

<!-- This is our frontpage! It has the massive search bar and the most recent snips! -->

<html>
  
  <head>
	<title>CodeAid</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://djyhxgczejc94.cloudfront.net/frameworks/bootstrap/3.0.0/themes/white-plum/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/css/styles.css" type="text/css">
  </head>
  
  <body>
	<nav class="navbar navbar-default large-navbar">
	  <div class="container-fluid">
		<div class="navbar-left">
		  <a class="navbar-brand" href="/"><img alt="CodeAid" src="/img/logo3.png" height="50px"></a>
		</div>
		<div class="navbar-right">
		  <a id="accounts"></a>
		  <a class="navbar-brand btn btn-default" id="new-snip-navbar"href="/s/create">New Snip <i class="fa fa-file-code-o"></i></a>
		</div>
	  </div>
	</nav>
	<div class="row">
		<form action="/s" method="post" id="snipform">
	  <div class="col-md-6">
		<div class="panel panel-default" id="editorHolder">
		  <div id="panel-header"><h3 id="snip-title-create" class="cool-comments-title">Snip: My new Snip</h3></div>
		  <div id="panel-body">
			<div id="editor"></div>
		  </div>
		</div>
	  </div>
	  <div class="col-md-5">
		<div class="panel panel-default">
		  <div id="preferencesEditor">
			<div id="panel-header"><h3>About your Snip!</h3></div>
			<div id="panel-body">
			  <select id="langselect" onchange="langChange();">
				  <option value="0">Select Language</option>
				  @foreach ($languages as $language)
					<option value="{{ $language->id }}" data-ace_name="{{ $language->ace_name }}">{{ $language->name }}</option>
				  @endforeach
			  </select>
			  <span class="input-group" id="textentry">
				<input type="text" class="form-control" placeholder="Name your Snip!" name="name" id="Name">
				<span class="input-group-btn">
				  <input type="submit" class="btn btn-default" value="Create" id="submit">
				</span>
			  </span>
                @if(count($errors->all()))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<textarea style="display:none;" id="content" name="comment"></textarea>
				<input type="hidden" id="languagefield" name="language_id">
			</div>
		  </div>
		</div>
	  </div>
			{!! csrf_field() !!}
		</form>
	</div>
	<div class="footer">
	  <p>Made by Freddy and Finnbar</p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.0/ace.js" type="text/javascript"></script>
	<script type="text/javascript">
	  var editor = ace.edit("editor");
	  var language = "Python";

	  var isLoggedIn = function() {
		$.getJSON("http://api.codeaid.xyz/auth/status", function (d) {
		  var isthere = false;
		  var name = "";
		  $.each(d,function(k,v) {
			if(k == "id") isthere = true;
			if(k == "name") name = v;
		  });
		  if(isthere) {
			$("#accounts").html('<a class="navbar-brand btn btn-default" id="new-snip-navbar" href="http://api.codeaid.xyz/auth/logout">Log Out ('+name+') <i class="fa fa-user"></i></a>');
		  }
		});
		$("#accounts").html('<a class="navbar-brand btn btn-default" id="new-snip-navbar" href="http://api.codeaid.xyz/auth/login">Log In/Sign Up <i class="fa fa-user"></i></a>');
	  };

	  $(document).ready(function () {
		$("#editor").height($(window).height()-300);
		$('#langselect').val('0'); //value of your default option
		isLoggedIn();
	  });
	  editor.setTheme("ace/theme/monokai");
	  $("#Name").bind("keypress", function () {
		setTimeout(function() {
		  $("#snip-title-create").html("Snip: "+$("#Name").val());
		},1);
	  });
	  var langChange = function() {
		 var lang = $( "select option:selected" ).attr('data-ace_name');
          var id = $("select option:selected").attr('value');
          $('#languagefield').val(id);
		editor.getSession().setMode("ace/mode/"+lang);
	  }

      var hasSubmitted = false;

	  $('#snipform').submit(function(event) {
          if (!hasSubmitted) {
              hasSubmitted = true;
              event.preventDefault();
              console.log('submit');
              $('#content').val(editor.getSession().getValue());
              $('#snipform').submit();
          }
	  });
	</script>
  </body>
</html>