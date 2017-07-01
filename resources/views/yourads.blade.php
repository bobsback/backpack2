
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
@if (count($entries) < 1)
<h3 style="text-align: center;">Squire you have no ads yet!</h3>
@else
<div style="padding:20px;"><h3>Some details about your ads:</h3>
Note - to change your URL or picture please email rob@myperfectad.com</div>
@endif 

                        @foreach($entries as $entry)
                        <div class="row" style="padding:20px;">
 <div class="col-md-4">
                <div class="">
                    <img src="{{ URL::to('storage/' . $entry->filename) }}" alt="ALT NAME" class="img-responsive"  />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                      
                    </div>
                </div>
</div>
<div class="col-md-4">
  
  

                         <p>{{$entry->URL}}</p>

    <p> @if ($entry->approved === 1)
                        Approved
                        @else
                        Pending
                        @endif</p>

@foreach ($agerange as $age)
@if ($entry->id === $age->fileid) 
@php $sum = $age->age; @endphp
          
            @endif
          @endforeach

          age range: {{$sum}} {{$sum+1}} {{$sum+2}} {{$sum+3}} {{$sum+4}}
                      
                        <p>{{$entry->gender}}</p>

                        <p>{{$entry->location}}</p>
<p>{{$entry->region}}</p>
<p>{{$entry->business_type}}</p>


</div>
<div class="col-md-4">
  <form action="/yourads/{{$entry->id}}"> 
 <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="row">
    <div class="funkyradio">
        <div class="funkyradio-default">
            <input type="radio" name="gender{{$entry->id}}" id="Male{{$entry->id}}" value="Male" />
            <label class="padding10" for="Male{{$entry->id}}">Male</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="gender{{$entry->id}}" id="Female{{$entry->id}}" value="Female" />
            <label class="padding10" for="Female{{$entry->id}}">Female</label>
        </div>
      
    </div>
  </div>
    <div class="row">
      
      <div class="in">
      <input name="age" id="ex{{$entry->id}}" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="14"/>
    </div>
    <script type="text/javascript">
$('#ex{{$entry->id}}').slider({
    formatter: function(value) {

        return value -5 + ' to ' + value;
    }
});
</script>
    
  </div>
  <div style='text-align:center;'>
    Select Country (with states):   <select id="country{{$entry->id}}" name ="location" class="form-control"></select> </br>
    Select Region: <select name ="region" id ="state{{$entry->id}}" class="form-control"></select>  </br> 
  
</div>
<script language="javascript">
    populateCountries("country{{$entry->id}}", "state{{$entry->id}}"); // first parameter is id of country drop-down and second parameter is id of state drop-down

</script>
   <input class="btn btn-primary purp" type="submit">
</form>
</div>
          </div>
            @endforeach
        </div>
    
   @stop