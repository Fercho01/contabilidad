@extends('admin.master')
@section('container')
    <h1>Editar Usuario</h1>

    <form action="{{  route('usuario.update',[$user->id]) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="exampleInputPassword1">Carnet de Identidad</label>
                <input name="ci" type="number" class="form-control" value="{{ $user->ci }}" id="exampleInputPassword1" placeholder="Ingresa el Carnet de Identidad">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input name="name" type="text" class="form-control" value="{{ $user->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar el nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Correo Electronico</label>
                <input name="email" type="email" class="form-control" value="{{ $user->email }}" id="exampleInputPassword1" placeholder="Ingresa el nombre de la empresa">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa la contraseña">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Confirmar Contraseña</label>
                <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Repetir contraseña">
            </div>
            <div class="form-group">
                <label for="role">Roles:</label>
                @foreach($roles as $role)
                    <ul class="list-unstyled">
                        <li>
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked=checked  @endif>
                            {{ $role->name }}
                            <span>({{ $role->description?: 'N/A' }})</span>
                        </li>
                    </ul>
                @endforeach
            </div>
            <a href="{{ route('usuario.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar Usuario</button>
@endsection
