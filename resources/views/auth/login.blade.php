@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Transport Tunisie</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form  method="post" class="form-horizontal" action="{{ route('login') }}" >
                {{ csrf_field() }}
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user red"></i>
                        </span>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Saisiez votre Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Saisiez Votre Password ">

                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember">
                            <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} > Remember me</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->

@endsection
