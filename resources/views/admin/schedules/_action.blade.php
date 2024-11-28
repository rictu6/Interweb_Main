@can('edit_schedule')
<a href="{{route('admin.schedules.edit',$user['id'])}}" data-toggle="tooltip" rel="tooltip" data-placement="top" title='Edit Schedule'  class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

{{-- <a href="{{route('admin.schedule_view',$user['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-book"></i>
</a> --}}
   <a href="{{route('admin.schedules.show',$user['id'])}}" data-toggle="tooltip" rel="tooltip" data-placement="top" title="View Files" target="_blank" class="btn btn-primary btn-sm">
                <i class="fa fa-eye"></i>
            </a>

<a  @if(isset($user)&&$user['status2']=="Approved") selected display @else hidden @endif


 href="{{route('admin.calendar_show_id',$user['id'])}}" target="_blank" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Show Calendar"  class="btn btn-primary btn-sm">
  <i class="fa fa-calendar"></i>
</a>

@can('delete_schedule')
<form method="POST" action="{{route('admin.schedules.destroy',$user['id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Delete Schedule"  class="btn btn-danger btn-sm delete_schedule">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan