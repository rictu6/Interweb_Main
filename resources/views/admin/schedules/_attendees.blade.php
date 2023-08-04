@foreach($user['roles'] as $role)
    <span class="badge badge-primary mr-1">
        @if(isset($role['role']))
            {{$role['role']['last_name']}}, {{$role['role']['first_name']}} {{$role['role']['middle_name']}}
        @endif
    </span>
@endforeach