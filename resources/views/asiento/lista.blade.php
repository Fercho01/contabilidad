@extends('admin.master')
@section('container')
    <h1 style="display: inline-block"> Asiento</h1>
    @can('asiento.registrar')
        <a href="{{route('asiento.registrar')}}">
            <button class="btn bg-success text-white" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Fecha</th>
                <th scope="col">Moneda</th>
                <th scope="col">Libro Diario</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getAsiento() as $asiento)
                <tr>
                    <th scope="row">{{ $asiento->id }}</th>
                    <td>{{ $asiento->created_at }}</td>
                    <td>{{ $asiento->moneda }}</td>
                    <td>{{ $asiento->librodiario->nombre }}</td>
                    <td>
                        @can('asiento.actualizar')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualizar-{{$asiento->id}}">
                                <i class="fa fa-edit"></i> Actualizar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="actualizar-{{$asiento->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                {{ csrf_field() }}

                                <form action="{{ url('/asientoactualizar', $asiento->id) }}" method="PUT">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Moneda</label>
                                                <input name="moneda" value="{{ $asiento->moneda }}"
                                                    type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Ingresar la descripción">
                                            </div>
                                            <div class="form-group">
                                                <label for="libroDiario_id">Libro Diario</label>
                                                <select name="libroDiario_id" id="libroDiario_id" class="form-control"
                                                    data-live-search="true" data-size="3" data-dropup-auto="false">
                                                    <option value="0" disabled>Seleccione:</option>
                                                    @foreach (getLibrosDiarios() as $libroDiario)
                                                        <option value="{{ $libroDiario->id }}" @if($libroDiario->nombre == $asiento->libroDiario->nombre) selected @endif>{{ $libroDiario->nombre }}</option>
                                                    @endforeach
                                                </select>
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
                        @can('asiento.eliminar')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $asiento->id }}">
                                <i class="far fa-trash-alt"></i> Eliminar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $asiento->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Eliminar Asiento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/asientoeliminar', $asiento->id) }}" method="put">

                                        <div class="modal-body">

                                            <label for="">Esta seguro que desea eliminar el asiento({{ $asiento->id }})</label>
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
