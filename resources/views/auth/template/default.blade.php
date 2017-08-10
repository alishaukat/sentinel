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
    <link rel="shortcut icon" href="{{ url('/') }}/template-assets/img/logo-fav.png">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/template-assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/template-assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ url('/') }}/template-assets/css/style.css" type="text/css"/>
    @show    
</head>
<body class="be-splash-screen">
    @include('shared.errors')
    @yield('content')
    
    @section('foot_assets')
    <script src="{{ url('/') }}/template-assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/template-assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/template-assets/js/main.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/template-assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	
      });
    </script>
    @show
</body>
</html>