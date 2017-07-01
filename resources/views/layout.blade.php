<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
        


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdn.rawgit.com/IshanDemon/List_Country_State/ed4386b4/countries.js"></script>

    <script src="https://rawgit.com/seiyria/bootstrap-slider/master/dist/bootstrap-slider.min.js"></script>
    <link href="css/slider.css" rel="stylesheet">
   
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css" /><link href="css/form.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="">
                    <a href="{{ url('/home') }}">
                        <img src="{{ url('/images/logo.png') }}" height="100" class="" alt="My Perfect Ad">
                    </a>
                </li>
                 @yield('sidebar')
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
                      <div class="headernav">   
        <a href="#menu-toggle" class="btn btn-default floatleft" id="menu-toggle"><span class="glyphicon glyphicon-th"></span></a> 
@if (Request::path() == 'home')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="btn-group floatleft" data-toggle="buttons">
  <label class="btn padding5 active new">
    <input type="radio" name="options" id="random" autocomplete="off" value="random" checked> Random
  </label>
  <label class="btn padding5 new">
    <input type="radio" name="options" id="best" autocomplete="off" value="clicks"> Best
  </label>
  <label class="btn padding5 new">
    <input type="radio" name="options" id="new" autocomplete="off" value="created_at"> New
</label>
</div>
<div class="quote">
                    "{{$quote}}" - {{$peep}}
                </div>
                @else
                <div class="quote">
                    Hello
                    @if (Auth::user())
{{ auth()->user()->name }}
@else
Mr or Mrs Anon
                    @endif
                </div>
@endif 
            <a class="floatright padding5" href="{{ url('/about') }}">?</a>
@if (Auth::guest())
            <a class="floatright padding5" href="{{ url('/login') }}">{{ trans('backpack::base.login') }}</a>
        
            <a class="floatright padding5" href="{{ url('/register') }}">Submit Ad</a>
            
        @else
            
            <a href="{{ url('admin/logout') }}" class="floatright padding5"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
            <a class="floatright padding5" href="{{ url('user') }}" > Create Add</a>
            @hasrole('admin')
<a class="floatright padding5" href="/admin">admin panel</a>
@else
@endhasrole
        @endif                        

</div>
             
            

@yield('content')

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/adminlte/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>

