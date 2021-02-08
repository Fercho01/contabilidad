@extends('admin.master')
@section('container')
    <h1>Registrar Factura Compra</h1>

    <form action="{{route('facturacompra.crear')}}" method="post">
    {{csrf_field()}}
    {{-- [ 'descripcion','monto','asiento_id','pedidoCompra_id' ]; --}}
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" value="{{ old('descripcion') }}" aria-describedby="emailHelp" placeholder="Ingresar la descripción...">
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="monto">Monto:</label>
            <input name="monto" type="text" class="form-control" id="monto" aria-describedby="emailHelp" value="{{ old('monto') }}" placeholder="Ingresar el monto...">
            @error('monto')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="asiento_id">Asiento</label>
            <select name="asiento_id" id="asiento_id" class="form-control"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getAsiento() as $asiento)
                    <option value="{{ $asiento->id }}">{{ $asiento->moneda }}</option>
                @endforeach
            </select>
            @error('asiento_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="pedidoCompra_id">Pedido Compra:</label>
            <select name="pedidoCompra_id" id="pedidoCompra_id" class="form-control"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getPedidoCompra() as $pedido)
                    <option value="{{ $pedido->id }}">{{ $pedido->descripcion }}</option>
                @endforeach
            </select>
            @error('pedidoCompra_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('facturacompra.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Factura Compra</button>
    </form>


@endsection
