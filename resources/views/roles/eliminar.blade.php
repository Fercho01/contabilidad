<div class="modal fade" id="delete-{{ $role->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Eliminar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('roles.destroy', $role->id) }}" method="GET">
                @csrf
                <div class="modal-body">
                    <label for="">Esta seguro que desea eliminar el rol({{ $role->id }})</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>

                </div>
            </form>

        </div>

    </div>
</div>
