<a  href="{{ route('producto.show', $id ) }}" class="btn btn-info btn-sm btn-circle" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-search    "></i></a>
<a  href="{{ route('producto.edit', $id ) }}" class="btn btn-primary btn-sm btn-circle" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-pencil-alt"></i></a>
<a  class="btn btn-danger btn-sm text-white eliminar_registro" data-id="{{$id}}" data-placement="left" title="Borrar orden compra" ><i class="fas fa-trash"></i></a>