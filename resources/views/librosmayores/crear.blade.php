@extends('admin.master')
@section('container')
    <h1>Registrar Libro Mayor</h1>

    <form action="{{route('libromayor.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar el nombre">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input name="descripcion" type="text" class="form-control" id="descripcion" aria-describedby="emailHelp" placeholder="Ingresar la descripcion">
        </div>
        <div class="form-group">
            <label for="librodiario_id">Libro Diario</label>
            <select name="librodiario_id" id="librodiario_id"  class="form-control" data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0">Seleccione:</option>
                @foreach (getLibrosDiarios() as $librodiario)
                    <option value="{{$librodiario->id}}">{{$librodiario->id}}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('libromayor.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Libro Mayor</button>
    </form>


@endsection
