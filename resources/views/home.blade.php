@extends('layouts.master')

@section('title')
@parent
@stop

@section('content')
@include('layouts.includes.header', array('heading'=>"Home"))
<div class="data-container">
</div>
<div class="loading">&nbsp;</div>
<hr>
@endsection

@section('foot_asset')
@parent
<script>
$(document).ready(function(e){

});
</script>
@stop