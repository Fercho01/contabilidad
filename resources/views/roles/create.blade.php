@extends('admin.master')
@section('container')
    <h2>Registra Rol</h2>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="nombre..">
                    @error('name')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="slug">URL:</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="url...">
                    @error('slug')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" id="description" name="description" class="form-control" placeholder="descripción..." >
                    @error('description')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <h3>Permiso especial</h3>
                <div class="input-group">
                    <span class="input-group-addon"  style="padding-right: 15px">
                        <input type="radio" class="" id="special" name="special" value="all-access"
                        @isset($role)
                        @if ($role->special=='all-access') {{'checked'}} @endif
                        @endisset>
                        Acceso total
                    </span>

                    <span class="input-group-addon">
                        <input type="radio" class="" id="special" name="special" value="no-access"
                        @isset($role)
                        @if ($role->special=='no-access') {{'checked'}}@endif
                        @endisset>Ningún acceso
                    </span>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <h4>Lista de permisos</h4>
                <div class="form-group">
                    @foreach($permissions as $permission)
                    <li class="list-group-item">
                        <input type="checkbox" value="{{ $permission->id }}"
                        name="permissions[]" id="permissions[{{ $permission->id }}]"
                        class="text-danger" style="cursor: pointer;"
                        @if(isset($assignedPermissions)){{in_array($permission->id,$assignedPermissions) ? 'checked':''}}@endif
                        >
                        <span class="text-info">{{ $permission->name }}</span>
                        <span class="text-red">({{ $permission->description ? : 'Sin descripción' }})</span>
                    </li>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-success"><i class="fa fa-home"></i> Inicio</a>
        </div>
    </form>



@endsection

















{{-- <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Roles</div>

            <div class="panel-body">   --}}
