<!DOCTYPE html>
<html>
    <head>
        <!-- including metas -->
        @section('metas')
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="">
            <meta name="author" content="">
        @show
        
        <!-- including title -->
        <title>
        @section('title')
        Sentinel
        @show
        </title>
        
        <!-- including assets -->
        @section('head_asset')
            <link rel="stylesheet" type="text/css" href="{{ url('/') }}/bootstrap/css/bootstrap.css"/>
            <link rel="stylesheet" href="{{ url('/') }}/css/3-col-portfolio.css" type="text/css"/>
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <link rel="stylesheet" href="{{ url('/') }}/css/style.css" type="text/css"/>
        @show
        
    </head>
    <body>
            <!-- Page Content -->
            <div class="container">
                @include('layouts.includes.nav')
                @include('shared.errors')
                @yield('content')
                @include('layouts.includes.footer')
            </div>
        
        <!-- including assets -->
        @section('foot_asset')
            <script src="{{ url('/') }}/js/jquery.js" type="text/javascript"></script>
            <script src="{{ url('/') }}/js/script.js" type="text/javascript"></script>
            <script src="{{ url('/') }}/bootstrap/js/bootstrap.js" type="text/javascript"></script>
            <script>
                $(function(){
                    $('.back-btn').click(function(){
                        window.location = '{{ URL::previous()  }}';
                    });
                });
                </script>
        @show
    </body>
</html>
