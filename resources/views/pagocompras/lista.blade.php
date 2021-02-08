@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Pago Compras</h1>
    @can('pagocompra.registrar')
        <a href="{{route('pagocompra.registrar')}}">
            <button class="btn bg-success text-white" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <th scope="col">Factura Compra</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getPagoCompra() as $pagocompra)
                <tr>
                    <th scope="row">{{ $pagocompra->id }}</th>
                    <td>{{ $pagocompra->created_at }}</td>
                    <td>{{ $pagocompra->monto }}</td>
                    <td>{{ $pagocompra->facturaCompra->descripcion }}</td>
                    <td>

                        <!-- Eliminar-->
                        @can('pagocompra.eliminar')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $pagocompra->id }}">
                                <i class="far fa-trash-alt"></i> Eliminar
                            </button>
                        @endcan

                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $pagocompra->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Eliminar Pago Compra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/pagocompraeliminar', $pagocompra->id) }}" method="put">

                                        <div class="modal-body">

                                            <label for="">Esta seguro que desea eliminar el pago compra({{ $pagocompra->id }})</label>
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
