@extends('admin.master')
@section('container')
    <h1>Registrar Libro Diario</h1>

    <form action="{{route('librodiario.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre:</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar el nombre...">
            @error('nombre')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" aria-describedby="emailHelp" placeholder="Ingresar la descripción">
            @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      {{--   <div class="form-group">
            <label for="empresa_id">Empresa:</label>
            <select name="empresa_id" id="empresa_id"  class="form-control" data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getEmpresas() as $empresa)
                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                @endforeach
            </select>
            @error('empresa_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}
        <a href="{{ route('librodiario.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Libros Diarios</button>
    </form>


@endsection
