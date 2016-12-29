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
        <link href="css/form.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
            <div class ="headernav">
                @if (Auth::guest())
            <a class="floatright padding5" href="{{ url('/login') }}">{{ trans('backpack::base.login') }}</a>
        
            <a class="floatright padding5" href="{{ url('/register') }}">{{ trans('backpack::base.register') }}</a>
            
        @else
           
           <div class="floatright padding5"><a href="{{ url('admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></div>
           <div class="floatright padding5"> {{ auth()->user()->email }}</div>
            @hasrole('admin')
<a href="/admin">admin panel</a>
@else
@endhasrole
        @endif                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-th"></span></a>
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

