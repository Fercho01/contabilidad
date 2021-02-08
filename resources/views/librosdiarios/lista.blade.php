@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Libro Diario</h1>
    @can('librodiario.registrar')
        <a href="{{route('librodiario.registrar')}}">
            <button class="btn bg-success text-white" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Empresa</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getLibrosDiarios() as $librodiario)
                <tr>
                    <th scope="row">{{ $librodiario->id }}</th>
                    <td>{{ $librodiario->nombre }}</td>
                    <td>{{ $librodiario->descripcion }}</td>
                    <td>{{ $librodiario->empresa->nombre }}</td>
                    <td>
                        @can('librodiario.actualizar')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#act-{{ $librodiario->id }}">
                                <i class="fa fa-edit"></i> Actualizar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="act-{{ $librodiario->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{ csrf_field() }}

                                <form action="{{ url('/librodiarioactualizar', $librodiario->id) }}" method="PUT">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Descripción</label>
                                                <input name="descripcion" value="{{ $librodiario->descripcion }}"
                                                    type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Ingresar la descripción">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="empresa_id">Empresa</label>
                                                <select name="empresa_id" id="empresa_id" class="form-control"
                                                    data-live-search="true" data-size="3" data-dropup-auto="false">
                                                    <option value="0" disabled>Seleccione:</option>
                                                    @foreach (getEmpresas() as $empresa)
                                                        <option value="{{ $empresa->id }}" @if($empresa->nombre==$librodiario->empresa->nombre) selected @endif>{{ $empresa->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Actualizar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>








                        <!-- Eliminar-->
                        @can('librodiario.eliminar')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $librodiario->id }}">
                                <i class="far fa-trash-alt"></i> Eliminar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $librodiario->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar libro diario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/librodiarioeliminar', $librodiario->id) }}" method="put">

                                        <div class="modal-body">

                                            <label for="">Esta seguro que desea eliminar el libro diario
                                                ({{ $librodiario->id }})</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>

                </tr>
            @endforeach



        </tbody>
    </table>

@endsection
