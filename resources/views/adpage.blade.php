
@extends('layout')


@section('sidebar')

<ul class="sidebarbutton">
                
<li><a href="yourads">Your Ads</a></li>
<li><a href="user">Create Ad</a></li>

</ul>
@stop

@section('content')
            <div class="container-fluid">
                @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
 
 <div style='padding:20px;'>
 <h1>Create your Ad</h1><br>
 <!-- 3 column org -->
<div class="row" style:"margin-bottom:180px;">
 <div class="col-md-4">
  <h2> Ad Info </h2>
 <form action="add" method="post" enctype="multipart/form-data">
  <img id="blah" src="#" alt="Your Advert" width="200px"><br>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <label class="btn btn-default btn-file btn-info"> Upload your Ad Image
        <input type="file" style="display: none;" name="filefield" id="imgInp">
        </label> 
        </div>
        <div class="col-md-4">
            <h2> Rules and stuff </h2>
<ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>
</div>
</div>
<!-- Text input--><br>
<div class="row form-group">    <div class="col-md-4">

  <label class="control-label" for="url">Advert Link</label>  
  <input id="url" name="url" type="text" placeholder="www.myawesomelink.com" class="form-control input-md">
    </div>
<div class="col-md-4"><br>
      <ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>
</div>
</div>
<div class="row form-group">
  <div class="col-md-4">

  <label class="control-label" for="businesstype">What is it?</label>
    <div class="funkyradio">
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio1" value="shopping" />
            <label class="padding10" for="radio1">Shopping</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio2" value="entertainment" />
            <label class="padding10" for="radio2">Enterainment</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio3" value="Third Option"/>
            <label class="padding10" for="radio3">Third Option success</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio4" />
            <label class="padding10" for="radio4">Fourth Option danger</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio5" />
            <label class="padding10" for="radio5">Fifth Option warning</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio6" />
            <label class="padding10" for="radio6">Sixth Option info</label>
        </div>
    </div>
   </div>
  <div class="col-md-4"><br>
    <ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>

</div>
  </div>

<div class="row form-group"><div class="col-md-4">
<h2>Target Audience</h2>

  <label class="row control-label" for="gender">Gender</label>
  <div class="row">
    <div class="funkyradio">
        <div class="funkyradio-success">
            <input type="radio" name="gender" id="Male" value="Male" />
            <label class="padding10" for="Male">Male</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="gender" id="Female" value="Female" />
            <label class="padding10" for="Female">Female</label>
        </div>
      
    </div>
  </div>
</div>
  <div class="col-md-4"><br>
<ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>
</div>
</div>
<!-- Age range -->

    <div class="row">
        <div class="col-md-4">

      <p id="">Target Age Range <br> Min: 0 Max:100</p><br><br>
      <div class="in">
      <input name="age" id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="5" data-slider-max="100" data-slider-step="1" data-slider-value="14"/>
    </div>
<script type="text/javascript">
$('#ex1').slider({
    formatter: function(value) {

        return value -5 + ' to ' + value;
    }
});
</script>
    
  </div>
    <div class="col-md-4"><br>
<ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>
</div>
    </div>
<!-- Location (inline) -->
<br>
<div class=" row form-group">
  <div class="col-md-4"> 

<div style='text-align:center;'>
    Select Country (with states):   <select id="country" name ="location" class="form-control"></select> </br>
    Select Region: <select name ="region" id ="state" class="form-control"></select>  </br> 
  
</div>
<script language="javascript">
    populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down

</script>
  </div>
  <div class="col-md-4"><br><ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>
</div> 
</div>       

<!-- div class="[ col-xs-12 col-sm-6 ]">
        <div class="[ form-group ]">
          @foreach (App\Http\Utilities\peopletype::all() as $type)
            <input type="checkbox" name="interests[]" id="{{$type}}" autocomplete="off" value="{{$type}}"/>
            <div class="[ btn-group ]">
                <label for="{{$type}}" class="[ btn btn-info ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="{{$type}}" class="[ btn btn-default active ]">
                    {{$type}}
                </label>
            </div>
            @endforeach
        </div>
              </div-->

<script type="text/javascript">
var $checkboxes = $('input[type=checkbox]');

$checkboxes.change(function () {
    if (this.checked) {
        if ($checkboxes.filter(':checked').length == 3) {
            $checkboxes.not(':checked').prop('disabled', true);
        }
    } else {
        $checkboxes.prop('disabled', false);
    }
});

</script>
 <div class="row">
 <div class="col-md-4">

 <h3>Customer Interest</h3>
<div class="control-group">
          <label for="input-tags">Select some interests:</label>
          <input type="text" id="input-tags" class="demo-default" name ="interests"  value="">
 </div>

@foreach( $interests as $interest)
<a class="btn buttontxt" id="{{$interest->interest}}">{{$interest->interest}}</a>
<script>
$('#input-tags').selectize({
          persist: false,
          createOnBlur: true,
          create: true,
          maxItems: 5
             
        });
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
 <div class="col-md-4">
<br>
  <ul>
  <li>Rule 1
  </li>
  <li>Rule 2
  </li>
  <li>Rule 3
  </li>
</ul>
</div> 
</div>
<div class="row">
 <div class="col-md-4"> <br>
 <div class="tooltip1"><div style="border-bottom: 1px dotted #000; font-weight: bold;
    font-size: 14px;text-decoration: underline;">  {{500-$count}} out of 500 Free Ads Left</div>
<span class="tooltiptext1">  Free untill the servers explode (they're really shitty servers)
</div><br>

 <input class="btn btn-success purp" style="font-weight:bold;"  type="submit">
 

</form>
</div> 
</div>
      </div>  
      </div>
            <script type="text/javascript">function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});</script>




   @stop