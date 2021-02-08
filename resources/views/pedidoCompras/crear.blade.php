@extends('admin.master')
@section('container')
    <h1>Registrar Pedido Compra</h1>

    <form action="{{ route('pedidoCompras.crear') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" aria-describedby="emailHelp" value="{{ old('descripcion') }}" placeholder="Ingresar la descripción...">
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_proveedor">Proveedores:</label>
            <select name="id_proveedor" id="id_proveedor"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" disabled selected>Seleccione:</option>
                @foreach (getProveedores() as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                @endforeach
            </select>
            @error('id_proveedor')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('pedidoCompras.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Pedido Compra</button>
    </form>


@endsection
