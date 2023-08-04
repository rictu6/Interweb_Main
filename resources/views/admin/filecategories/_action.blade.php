@can('edit_filecategory')
<a href="{{route('admin.filecategories.edit',$filecategory['cat_id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_filecategory')
<form method="POST" action="{{route('admin.filecategories.destroy',$filecategory['cat_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_filecategory">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan