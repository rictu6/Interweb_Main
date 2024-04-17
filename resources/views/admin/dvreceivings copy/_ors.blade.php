@foreach($dv['obli'] as $hdr)
    <span class="badge badge-primary mr-1">
        @if(isset($hdr))
            {{$hdr['ors_no']}}
        @endif
    </span>
@endforeach
