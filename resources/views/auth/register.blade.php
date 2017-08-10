@extends('auth/template/master')

{{-- Page title --}}
@section('title')
    Sign Up
    @parent
@stop


{{-- page level styles --}}
@section('head_assets')
    @parent
@stop

@section('content')
<div class="panel-heading">
    <div class="panel-title">Sign Up</div>
    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="{{ route('login') }}">Sign In</a></div>
</div>
<div style="padding-top:30px" class="panel-body" >
    @include('shared.errors')
    <form action="{{ route('post-register') }}" method="post" class="form-horizontal" role="form">
        {!! csrf_field() !!}
        <input type="hidden" name="url" value="{{ old('url', empty($url)?"":$url) }}">
        
        <div class="form-group">
            <label for="first_name" class="col-md-3 control-label">First Name</label>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" placeholder="First Name">
            </div>
        </div>

        <div class="form-group">
            <label for="last_name" class="col-md-3 control-label">Last Name</label>
            <div class="col-md-9">
                <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
        </div>
                
        <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-md-9">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>

        <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls">
                <button type="submit" class="btn btn-success">Sign Up</button>
            </div>
        </div>
                
    </form>
</div>
@stop


{{-- page level script --}}
@section('foot_assets')
    @parent
    
@stop