<!doctype html>
<head>
    <title>Register</title>
    <link href="https://djyhxgczejc94.cloudfront.net/frameworks/bootstrap/3.0.0/themes/white-plum/bootstrap.min.css" rel="stylesheet"/>
    <link href="/css/auth.css" rel="stylesheet"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="/auth/login"  id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" class="active" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="register-form" action="/auth/register" method="post" role="form">
                                {!! csrf_field() !!}
                                @if(count($errors->all()))
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="{{ old('name') }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="confirm-password" tabindex="4" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="5" class="form-control btn btn-register btn-primary" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>