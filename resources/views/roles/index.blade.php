@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Roles</h1>
    @can('roles.create')
        <a href="{{route('roles.create')}}">
            <button class="btn bg-success text-white" style="margin-bottom: 12px"><i class="fa fa-plus"></i> Nuevo</button>
        </a>
    @endcan
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                @if ($role->description)
                    <td>{{ $role->description }}</td>
                @else
                    <td class="text-blue">(Sin descripción)</td>
                @endif
                <td>
                    @can('roles.edit')
                        <a href="{{ route('roles.edit', $role->id) }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                                Editar
                            </button>
                        </a>
                    @endcan

                    @can('roles.destroy')
                        <a href="" data-target="#delete-{{$role->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button></a>
                    @endcan
                </td>
            </tr>
            @include('roles.eliminar')
        @endforeach
        </tbody>
    </table>
@endsection
