@if ($fta->status == 'ongoing')
    <span class="badge badge-success">{{ $fta->status }}</span>
@else
    <span class="badge badge-secondary">{{ $fta->status }}</span>
@endif











