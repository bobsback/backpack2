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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="js/myajax.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li >
                    <a href="{{ url('/home') }}">
                        <img src="{{ url('/images/logo.png') }}" height="100" class="" alt="My Perfect Ad">
                    </a>
                </li>
            @if (Request::path() == 'home')
            <li> Choose youself:
            
           <!-- Ad Query form -->
           <form> 
    <div class="funkyradio">
        <div class="funkyradio-primary">
            <input type="radio" name="radiob" id="radiob1" value="Male" />
            <label class="padding10" for="radiob1">Male</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="radiob" id="radiob2" value="Female" />
            <label class="padding10" for="radiob2">Female</label>
        </div>
      
    </div>    



</form>           
 </li>
@endif

</div>
</ul>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
             <div class="headernav">   @if (Auth::guest())
            <a class="floatright padding5" href="{{ url('/login') }}">{{ trans('backpack::base.login') }}</a>
        
            <a class="floatright padding5" href="{{ url('/register') }}">Submit Ad</a>
            
        @else
            <a class="floatright padding5">{{ auth()->user()->name }}</a> 
            <a href="{{ url('admin/logout') }}" class="floatright padding5"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
            <a class="floatright padding5" href="{{ url('user') }}" > Create Add</a>
            @hasrole('admin')
<a class="floatright padding5" href="/admin">admin panel</a>
@else
@endhasrole
        @endif                        
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-th"></span></a> 
@if (Request::path() == 'home')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="btn-group" data-toggle="buttons">
  <label class="btn padding5 active new">
    <input type="radio" name="options" id="random" autocomplete="off" value="random" checked> Random
  </label>
  <label class="btn padding5 new">
    <input type="radio" name="options" id="best" autocomplete="off" value="clicks"> Best
  </label>
  <label class="btn padding5 new">
    <input type="radio" name="options" id="new" autocomplete="off" value="created_at"> New
</div>
@endif 
</div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                         

                        @yield('content')

                    </div>
                </div>
            </div>
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
