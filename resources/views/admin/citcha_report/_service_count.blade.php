@foreach($cc as $row)
        @if(empty($cc['service_count']))
          {{$cc->service_count=$cc->where('service_id','=',$cc->service_id)->count()}}
        @endif

@endforeach

