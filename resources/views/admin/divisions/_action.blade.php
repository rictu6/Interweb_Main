@can('edit_division')
<a href="{{route('admin.divisions.edit',$division['div_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_division')
<form method="POST" action="{{route('admin.divisions.destroy',$division['div_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_division">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan