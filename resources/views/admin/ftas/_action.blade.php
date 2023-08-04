@can('edit_fta')
    <a href="{{route('admin.ftas.edit',$fta['fta_id'])}}" class="btn btn-primary btn-sm">
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('delete_fta')
    <form method="POST" action="{{route('admin.ftas.destroy',$fta['fta_id'])}}"  class="d-inline">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger btn-sm delete_fta">
            <i class="fa fa-trash"></i>
        </button>
    </form>
@endcan
