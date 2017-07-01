

@extends('home')

@section('content')

<div class="ajax" id="ajax">
@foreach($entries as $entry)
 <div class="grow ad">
                    <a id="" href="{{$entry->URL}}" target="_blank" class="click"><img src="{{ URL::to('storage/' . $entry->filename) }}" alt="{{$entry->URL}}" class=""/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></a>       
            </div> 
            @endforeach
</div>
@endsection