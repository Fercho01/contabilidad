@extends('admin.master')
@section('container')
    <h2>Registrar Cliente</h2>

    <form action="{{route('cliente.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="ci">Carnet Identidad</label>
            <input name="ci" type="text" class="form-control" id="ci" aria-describedby="emailHelp" value="{{ old('ci') }}" placeholder="Ingresar el carnet identidad...">
            @error('ci')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre" value="{{ old('nombre') }}" aria-describedby="emailHelp" placeholder="Ingresar el nombre">
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input name="direccion" type="text" class="form-control" value="{{ old('direccion') }}" id="direccion" aria-describedby="emailHelp" placeholder="Ingresar la dirección...">
            @error('direccion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputPassword1">Empresa</label>
            <input name="empresa" type="text" class="form-control" value="{{ old('empresa') }}" id="exampleInputPassword1" placeholder="Ingresa el nombre de la empresa">
            @error('empresa')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> --}}
        <a href="{{ route('cliente.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Cliente</button>
    </form>


@endsection
