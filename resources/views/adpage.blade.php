
@extends('layout')


@section('sidebar')

Submit Advert
New Advert
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
    <div class="row">
 
    <ul>
 @foreach($entries as $entry)
 <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{ URL::to('storage/' . $entry->filename) }}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div> 
            @endforeach
    </ul>
 </div>
 <h2>Your Thing</h2>

 <form action="add" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <label class="btn btn-default btn-file btn-info"> Upload your Ad Image
        <input type="file" style="display: none;" name="filefield" id="imgInp">
        </label>
        <h4>Preview</h4>
<img id="blah" src="#" alt="your image" width="200px">

<!-- Text input-->
<div class="row form-group">
  <label class="col-md-4 control-label" for="url">Advert Link</label>  
  <div class="col-md-4">
  <input id="url" name="url" type="text" placeholder="www.myawesomelink.com" class="form-control input-md">
  </div>
</div>

<div class="row form-group">
  <label class="row control-label" for="businesstype">What is it?</label>
  <div class="row">
    <div class="funkyradio">
        <div class="funkyradio-default">
            <input type="radio" name="businesstype" id="radio1" value="shopping" />
            <label class="padding10" for="radio1">Shopping</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="businesstype" id="radio2" value="entertainment" />
            <label class="padding10" for="radio2">Enterainment</label>
        </div>
        <div class="funkyradio-success">
            <input type="radio" name="businesstype" id="radio3" value="Third Option"/>
            <label class="padding10" for="radio3">Third Option success</label>
        </div>
        <div class="funkyradio-danger">
            <input type="radio" name="businesstype" id="radio4" />
            <label class="padding10" for="radio4">Fourth Option danger</label>
        </div>
        <div class="funkyradio-warning">
            <input type="radio" name="businesstype" id="radio5" />
            <label class="padding10" for="radio5">Fifth Option warning</label>
        </div>
        <div class="funkyradio-info">
            <input type="radio" name="businesstype" id="radio6" />
            <label class="padding10" for="radio6">Sixth Option info</label>
        </div>
    </div>
  </div>
</div>
<h2>Target Audience</h2>
<div class="row form-group">
  <label class="row control-label" for="gender">Gender</label>
  <div class="row">
    <div class="funkyradio">
        <div class="funkyradio-default">
            <input type="radio" name="gender" id="Male" value="Male" />
            <label class="padding10" for="Male">Male</label>
        </div>
        <div class="funkyradio-primary">
            <input type="radio" name="gender" id="Female" value="Female" />
            <label class="padding10" for="Female">Female</label>
        </div>
      
    </div>
  </div>
</div>
<!-- Age range -->
<script>
$(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

      if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
      } else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
      }
    

    }).mouseup(function(){
        clearInterval(action);
    });
});
</script>
    <div class="row">
      <p id="">Target Age Range <br> Min: 0 Max:100</p>
      
    <div class="col-xs-3 col-xs-offset-3">
      <div class="input-group number-spinner">
        <span class="input-group-btn data-dwn">
          <button class="btn btn-default btn-info" type="button" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
        </span>
        <input type="text" class="form-control text-center" name="age" value="1" min="0" max="100">
        <span class="input-group-btn data-up">
          <button class="btn btn-default btn-info" type="button" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
        </span>
      </div>
    </div>
    
  </div>
    

<!-- Location (inline) -->
<div class=" row form-group">
  <div class="col-md-4"> 
  <select id="location" name="location" class="form-control">
@foreach (App\Http\Utilities\locations::all() as $location)
<option value="{{$location}}">{{$location}}</option>

@endforeach
  </select>
  </div>
</div>
<div class="[ col-xs-12 col-sm-6 ]">
        <h3>Customer Interest</h3><hr />
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

 <input class="btn btn-primary" type="submit">
</form>

        
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