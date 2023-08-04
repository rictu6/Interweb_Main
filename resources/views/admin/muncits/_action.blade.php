@can('edit_muncit')
<a class="btn btn-primary btn-sm" href="{{route('admin.muncits.edit',$muncit['muncit_id'])}}">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_muncit')
<form method="POST" action="{{route('admin.muncits.destroy',$muncit['muncit_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_muncit">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan

