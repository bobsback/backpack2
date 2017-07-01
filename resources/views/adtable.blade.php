
@foreach($entries as $entry)
 <div class="grow ad"><form>
                    <a id="" href="{{$entry->URL}}" target="_blank" class="click"><img src="{{ URL::to('storage/' . $entry->filename) }}" alt="{{$entry->URL}}" class=""/>
                    	{{ csrf_field() }}
                   </form>
            </div> 
            @endforeach