<!DOCTYPE html>
<head>
    @section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    @show

    <title>
    @section('title')
    Sentinel
    @show
    </title>
    
    @section('head_assets')
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/bootstrap/css/bootstrap.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ url('/') }}/css/auth-style.css" type="text/css"/>
    @show    
</head>
<body class="be-splash-screen">
    <div class="container">
        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                @yield('content')
            </div>
        </div>
    </div>
    @section('foot_assets')
    <script src="{{ url('/') }}/js/jquery.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/js/script.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    @show
</body>
</html>