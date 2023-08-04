@foreach($fta as $row)
        @if(empty($fta['frequency_of_travel']))
          {{$fta->frequency_of_travel=$fta->where('lce_id','=',$fta->lce_id)->count()}}
        @endif

@endforeach

