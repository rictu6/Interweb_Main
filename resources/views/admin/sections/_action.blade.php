@can('edit_section')
<a class="btn btn-primary btn-sm" href="{{route('admin.sections.edit',$section['sec_id'])}}">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_section')
<form method="POST" action="{{route('admin.sections.destroy',$section['sec_id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_section">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan

