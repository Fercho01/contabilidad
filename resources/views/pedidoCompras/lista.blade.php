@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Pedido Compras</h1>
    @can('pedidoCompras.registrar')
        <a href="{{route('pedidoCompras.registrar')}}">
            <button class="btn btn-success" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Descripción</th>
                <th scope="col">Empresa</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php //dd(getPedidoCompra()) ?>
        @foreach(getPedidoCompra() as $pedido)
            <tr>
                <th scope="row">{{$pedido->id}}</th>
                <td> {{ $pedido->descripcion }}</td>
                <td> {{ $pedido->empresa->nombre  }}      </td>
                <td> {{ $pedido->proveedor->nombre   }}</td>
                <td>
                    @can('pedidoCompras.actualizar')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#act-{{ $pedido->id }}">
                            <i class="fa fa-edit"></i> Actualizar
                        </button>
                    @endcan
                    <!-- Modal -->
                    <div class="modal fade" id="act-{{ $pedido->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            {{csrf_field()}}

                            <form action="{{ url('pedidocompraactualizar', $pedido->id) }}" method="PUT">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actualizar </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input name="descripcion" type="text" value="{{ $pedido->descripcion }}" class="form-control" id="descripcion" aria-describedby="emailHelp" placeholder="Ingresar la descripcion">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_proveedor">Proveedores:</label>
                                        <select name="id_proveedor" id="id_proveedor"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                            @foreach (getProveedores() as $proveedor)
                                                <option value="{{ $proveedor->id }}" @if($proveedor->nombre == $pedido->proveedor->nombre) selected @endif>{{ $proveedor->nombre }}</option>
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
                    @can('pedidoCompras.eliminar')
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $pedido->id }}">
                            <i class="far fa-trash-alt"></i> Eliminar
                        </button>
                    @endcan

                    <!-- Modal -->
                    <div class="modal fade" id="delete-{{ $pedido->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Eliminar Pedido</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/pedidocompraeliminar', $pedido->id) }}" method="put">

                                    <div class="modal-body">

                                        <label for="">Esta seguro que desea eliminar el pedido({{ $pedido->id }})</label>
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
