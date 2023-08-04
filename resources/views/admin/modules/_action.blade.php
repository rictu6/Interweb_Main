@can('edit_permission')
    <a href="{{route('admin.modules.edit',$module['id'])}}" class="btn btn-primary btn-sm">
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('delete_permission')
    <form method="POST" action="{{route('admin.modules.destroy',$module['id'])}}" class="d-inline">
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-danger btn-sm delete_permission">
            <i class="fa fa-trash"></i>
        </button>
    </form>
@endcan