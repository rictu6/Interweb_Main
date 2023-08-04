@can('edit_position')
<a class="btn btn-primary btn-sm" href="{{route('admin.positions.edit',$position['pos_id'])}}">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_position')
<form method="POST" action="{{route('admin.positions.destroy',$position['pos_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_position">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan

