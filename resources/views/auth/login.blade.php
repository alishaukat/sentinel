@extends('auth/template/master')

{{-- Page title --}}
@section('title')
    Login
    @parent
@stop


{{-- page level styles --}}
@section('head_assets')
    @parent
@stop

@section('content')
<div class="panel-heading">
    <div class="panel-title">Sign In</div>
    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ route('forgot-password') }}">Forgot password?</a></div>
</div>
<div style="padding-top:30px" class="panel-body" >
    @include('shared.errors')
    <form action="{{ route('post-login') }}" method="post" class="form-horizontal" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="url" value="{{ old('url', empty($url)?"":$url) }}">
        
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>

        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="input-group">
            <div class="checkbox">
              <label>
                <input id="remember" type="checkbox" name="remember" value="{{ old('remember') }}"> Remember me
              </label>
            </div>
        </div>

        <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls">
                <button type="submit" class="btn btn-success">Login</button>
              <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                    Don't have an account! 
                <a href="{{ route('register') }}">
                    Sign Up Here
                </a>
                </div>
            </div>
        </div>
    </form>
</div>
@stop


{{-- page level script --}}
@section('foot_assets')
    @parent
@stop