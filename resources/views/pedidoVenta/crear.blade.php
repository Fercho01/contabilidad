@extends('admin.master')
@section('container')
    <h2>Registrar Pedido Venta</h2>

    <form action="{{route('pedidoventa.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" value="{{ old('descripcion') }}" aria-describedby="emailHelp" placeholder="Ingresar la descripción...">
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getCliente() as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
            @error('cliente_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('pedidoventa.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Pedido Venta</button>
    </form>


@endsection
