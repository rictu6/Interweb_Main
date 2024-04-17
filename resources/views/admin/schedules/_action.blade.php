@can('edit_schedule')
<a href="{{route('admin.schedules.edit',$user['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan
@can('Schedule_Viewer') 
<a href="{{route('admin.schedule_view',$user['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-book"></i>
</a>
 @endcan
@can('delete_schedule')
<form method="POST" action="{{route('admin.schedules.destroy',$user['id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_schedule">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan