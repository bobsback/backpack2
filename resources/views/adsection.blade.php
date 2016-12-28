

@extends('home')

@section('content')

<div class="ajax" id="ajax">
@foreach($entries as $entry)
 <div class="col-md-2">
                <div class="thumbnail">
                    <a id="adimage" href="{{$entry->URL}}" target="_blank" class="click"><img src="{{ URL::to('storage/' . $entry->filename) }}" alt="{{$entry->URL}}" class="img-responsive"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></a>
                    <div class="caption">
                        <p>{{$entry->URL}}</p>
                    </div>
                </div>
            </div> 
            @endforeach

</div>




@endsection