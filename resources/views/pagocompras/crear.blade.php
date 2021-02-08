@extends('admin.master')
@section('container')
    <h1>Registrar Pago Compra</h1>

    <form action="{{route('pagocompra.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Monto</label>
            <input name="monto" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar el monto...">
            @error('monto')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="facturaCompra_id">Factura Compra</label>
            <select name="facturaCompra_id" id="facturaCompra_id" class="custom-select"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getFacturaCompra() as $facturacompra)
                    <option value="{{ $facturacompra->id }}">{{ $facturacompra->descripcion }}</option>
                @endforeach
            </select>
            @error('facturaCompra_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('pagocompra.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Pago Compra</button>
    </form>


@endsection
