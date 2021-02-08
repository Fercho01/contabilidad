<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate();

        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        // Actualizamos permisos
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index')->with('info','Creado con éxito');
    }
    public function edit(Role $role)
    {
        // Devolvemos a la vista el ARRAY con todos los PERMISOS
        $permissions = Permission::get();
        // Devolvemos a la vista 3 ARRAY , uno con el ROLE, otro con TODOS los PERMISOS posibles y otro con los PERMISOS del ROLE
        //$role = Role::findOrFail($role);
        $assignedPermissions = $role->permissions->pluck('id')->toArray();
        return view('roles.edit', compact('role', 'permissions', 'assignedPermissions'));

    }
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');
        $role->save();//($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index')->with('act','Actualizado con éxito');
    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('delete','Eliminado con éxito');
    }
}
