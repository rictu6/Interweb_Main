@can('edit_empstatus')
<a href="{{route('admin.empstatuss.edit',$empstatus['emp_status_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_empstatus')
<form method="POST" action="{{route('admin.empstatuss.destroy',$empstatus['emp_status_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_empstatus">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan