@extends('admin.master')
@section('container')
    <h2>Registrar Factura Venta</h2>

    <form action="{{route('facturaventa.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input name="descripcion" type="text" class="form-control" value="{{ old('descripcion') }}" id="descripcion" aria-describedby="emailHelp" placeholder="Ingresar la descripción...">
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="monto">Monto:</label>
            <input name="monto" type="number" class="form-control" id="monto" value="{{ old('monto') }}" aria-describedby="emailHelp" placeholder="Ingresar el monto...">
            @error('monto')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="asiento_id">Asiento:</label>
            <select name="asiento_id" id="asiento_id" class="form-control"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getAsiento() as $asiento)
                    <option value="{{ $asiento->id }}">{{ $asiento->id }}</option>
                @endforeach
            </select>
            @error('asiento_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pedidoVenta_id">Pedido Venta:</label>
            <select name="pedidoVenta_id" id="pedidoVenta_id" class="form-control"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getPedidoVenta() as $pedido)
                    <option value="{{ $pedido->id }}">{{ $pedido->descripcion }}</option>
                @endforeach
            </select>
            @error('pedidoVenta_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('facturaventa.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Factura Venta</button>
    </form>


@endsection
