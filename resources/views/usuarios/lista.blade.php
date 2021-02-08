@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Usuarios</h1>
    @can('usuario.registrar')
        <a href="{{route('usuario.registrar')}}">
            <button class="btn bg-success text-white" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Carnet Identidad</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach(getUsers() as $user)
            <tr>
                <th scope="row">{{$user->ci}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @can('usuario.edit')
                        <a href="{{ route('usuario.edit',['id' => $user->id]) }}">
                            <button class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
                        </a>
                    @endcan
                </td>
            @endforeach
            </tr>
        </tbody>
    </table>

@endsection
