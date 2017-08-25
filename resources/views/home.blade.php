<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/form.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="js/myajax.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://rawgit.com/seiyria/bootstrap-slider/master/dist/bootstrap-slider.min.js"></script>
    <link href="https://rawgit.com/seiyria/bootstrap-slider/master/dist/css/bootstrap-slider.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css"/>
        <script src="https://cdn.rawgit.com/IshanDemon/List_Country_State/ed4386b4/countries.js"></script><link href="css/form.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">

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
           <!-- gender -->
    <div class="funkyradio">
        <div class="funkyradio-success">
            <input type="radio" name="radiob" id="radiob1" value="Male" />
            <label class="padding10" for="radiob1">Male</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="radiob" id="radiob2" value="Female" />
            <label class="padding10" for="radiob2">Female</label>
        </div>   
    </div>
<!-- Age -->
How old are you?<br>
<input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="21"/>
<!-- Location -->
<script type="text/javascript">
$('#ex1').slider({
    formatter: function(value) {
        return  value;
    }
});
</script>

Where are you?<br>
<div style='text-align:center;'>
    <select id="country" name ="location" class="form-control"></select>

<div style='padding:5px;'></div>

    <select name ="region" id ="state" class="form-control" ></select>  
  
</div>
<script language="javascript">
    populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down

</script>
</li>
<div style='padding:4px'>
What do you feel like doing?<br>
<input class='radio' type='radio' value='1' name='radio2' id='radio1'/>
        <label class="btn buttontxt" for='radio1'>Shopping</label>
    
        <input class='radio' type='radio' value='2' name='radio2'  id='radio2'/>
        <label class="btn buttontxt" for='radio2'>News</label>
   
        <input class='radio' type='radio' value='3' name='radio2'  id='radio3'/>
        <label class="btn buttontxt" for='radio3'>Fun</label>
<input class='radio' type='radio' value='3' name='radio2'  id='radio4'/>
        <label class="btn buttontxt" for='radio4'>random</label>
<br>What do you love?<br> 

                  <input type="text" id="input-tags" class="demo-default" name ="interests"  value="">
<script>
$('#input-tags').selectize({
          persist: false,
          createOnBlur: true,
          create: true,
            plugins: ['remove_button']
        });</script>
              @foreach( $interests as $interest)
<a class="btn buttontxt" id="{{$interest->interest}}">{{$interest->interest}}</a>
<script>

 $("#{{$interest->interest}}").click(function(){
    var value = $(this).html();
var selectize_tags = $("#input-tags")[0].selectize
    selectize_tags.addOption({
        text: value,
        value: value
    });
    selectize_tags.addItem(value)
    selectize_tags.refreshItems()
     });
</script>
@endforeach
</div>
</form>           
@endif
</div>
</ul>
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
            <a class="floatright padding5">{{ auth()->user()->name }}</a> 
            <a href="{{ url('admin/logout') }}" class="floatright padding5"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
            <a class="floatright padding5" href="{{ url('user') }}" > Create Add</a>
            @hasrole('admin')
<a class="floatright padding5" href="/admin">admin panel</a>
@else
@endhasrole
        @endif                        

</div>
            <div class="container-fluid">
                <div class="">
                         
        <div id='loading'></div>
                        @yield('content')

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
