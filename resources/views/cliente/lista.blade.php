@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Clientes</h1>
    @can('cliente.registrar')
        <a href="{{route('cliente.registrar')}}">
            <button class="btn bg-success text-white" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Carnet Identidad</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getCliente() as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->ci }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        @can('cliente.actualizar')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#act-{{ $cliente->id }}">
                                <i class="fa fa-edit"></i> Actualizar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="act-{{ $cliente->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{ csrf_field() }}

                                <form action="{{ url('/clienteactualizar', $cliente->id) }}" method="PUT">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="ci">Carnet Identidad</label>
                                                <input name="ci" type="text" class="form-control" id="ci" value="{{ $cliente->ci }}"aria-describedby="emailHelp" placeholder="Ingresar el carnet identidad">
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $cliente->nombre }}"aria-describedby="emailHelp" placeholder="Ingresar el nombre">
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion">Dirección</label>
                                                <input name="direccion" type="text" class="form-control" id="direccion" value="{{ $cliente->direccion }}"aria-describedby="emailHelp" placeholder="Ingresar la dirección">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Actualizar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Eliminar-->
                        @can('cliente.eliminar')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar-{{ $cliente->id }}">
                                <i class="far fa-trash-alt"></i> Eliminar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="eliminar-{{ $cliente->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Eliminar Cliente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/clienteeliminar', $cliente->id) }}" method="put">

                                        <div class="modal-body">

                                            <label for="">Esta seguro que desea eliminar el cliente({{ $cliente->nombre }})</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
