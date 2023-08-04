@can('edit_province')
<a class="btn btn-primary btn-sm" href="{{route('admin.provinces.edit',$province['prov_id'])}}">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_province')
<form method="POST" action="{{route('admin.provinces.destroy',$province['prov_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_province">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan

