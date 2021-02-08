@extends('admin.master')
@section('container')
    <h1>Registrar Proveedor</h1>

    <form action="{{url('/proveedorcrear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre:</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nombre') }}" placeholder="Ingresar el nombre...">
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Apellido:</label>
            <input name="apellido" type="text" class="form-control" id="exampleInputPassword1" value="{{ old('apellido') }}" placeholder="Ingresa el apellido...">
            @error('apellido')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Carnet de Identidad:</label>
            <input name="ci" type="number" class="form-control" id="exampleInputPassword1" value="{{ old('ci') }}" placeholder="Ingresa el carnet de identidad...">
            @error('ci')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Empresa:</label>
            <input name="empresa" type="text" class="form-control" id="exampleInputPassword1" value="{{ old('empresa') }}" placeholder="Ingresa el nombre de la empresa...">
            @error('empresa')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('proveedor.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Proveedor</button>
    </form>


@endsection
