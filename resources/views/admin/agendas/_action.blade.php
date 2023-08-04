@can('edit_agenda')
<a href="{{route('admin.agendas.edit',$agenda['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-edit"></i>
</a>
@endcan

@can('delete_agenda')
<form method="POST" action="{{route('admin.agendas.destroy',$agenda['id'])}}" class="d-inline">
  <input type="hidden" name="_method" value="delete">
  <button type="submit" class="btn btn-danger btn-sm delete_agenda">
      <i class="fa fa-trash"></i>
  </button>
</form>
@endcan