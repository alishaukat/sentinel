@extends('auth/template/master')

{{-- Page title --}}
@section('title')
    Forgot Password
    @parent
@stop


{{-- page level styles --}}
@section('head_assets')
    @parent
@stop

@section('content')
<div class="panel-heading">
    <div class="panel-title">Password Reset</div>
    <div style="float:right; font-size: 80%; position: relative; top:-10px">
    </div>
</div>
<div style="padding-top:30px" class="panel-body" >
    @include('shared.errors')
    <form action="{{ route('post-password-reset', array("email"=>$email, "code"=>$code)) }}" method="post" class="form-horizontal" role="form">
        {!! csrf_field() !!}
        <p>Enter new password</p>
        
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="New Password">
        </div>
        
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="confirm-password" type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
        </div>

        <div style="margin-top:10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls">
                <button type="submit" class="btn btn-success">Reset Password</button>
            </div>
        </div>
    </form>
</div>
@stop


{{-- page level script --}}
@section('foot_assets')
    @parent
@stop