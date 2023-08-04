@can('edit_agenda')
<a href="{{route('admin.agendas.edit',$agenda['id'])}}" class="btn btn-primary btn-sm">
  <i class="fa fa-calendar"></i>
</a>
@endcan
