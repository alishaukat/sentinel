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
    <div class="panel-title">Forgot your password?</div>
    <div style="float:right; font-size: 80%; position: relative; top:-10px">
    </div>
</div>
<div style="padding-top:30px" class="panel-body" >
    @include('shared.errors')
    <form action="{{ route('post-forgot-password') }}" method="post" class="form-horizontal" role="form">
        {!! csrf_field() !!}
        <p>Don't worry, we'll send you an email to reset your password.</p>
        
        <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>

        <div style="margin-top:10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls">
                <button type="submit" class="btn btn-success">Reset Password</button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                    Don't remember your email?
                <a href="#">
                    Contact Us
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