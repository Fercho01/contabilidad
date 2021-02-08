@extends('admin.master')
@section('container')
    <h1>Registrar Asiento</h1>

    <form action="{{route('asiento.crear')}}" method="post">
    {{csrf_field()}}
        <div class="form-group">
            <label for="moneda">Moneda:</label>
            <input name="moneda" type="text" class="form-control" id="moneda" aria-describedby="emailHelp" placeholder="Ingresar moneda..." value="{{ old('moneda') }}">
            @error('moneda')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="libroDiario_id">Libro Diario:</label>
            <select name="libroDiario_id" id="libroDiario_id" class="form-control"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected disabled>Seleccione:</option>
                @foreach (getLibrosDiarios() as $libroDiario)
                    <option value="{{ $libroDiario->id }}">{{ $libroDiario->nombre }}</option>
                @endforeach
            </select>
            @error('libroDiario_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <a href="{{ route('asiento.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Asiento</button>
    </form>


@endsection
