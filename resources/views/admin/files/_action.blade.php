

@can('view_file')


<a href="{{route('admin.files.show',$file['id'])}}" target="_blank"  class="btn btn-primary btn-sm">
  <i class="fa fa-eye"></i>
</a>

{{-- <a href="{{route('admin.files.show',$file['id'])}}" data-toggle="lightbox" data-title="Reports logo">
  <i class="fa fa-image"></i>
</a> --}}

@endcan

@can('edit_file')
<a href="{{route('admin.files.edit',$file['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan


@can('delete_file')
<form method="POST" action="{{route('admin.files.destroy',$file['id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_file">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan


