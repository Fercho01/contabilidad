<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('usuarios.lista', compact('roles'));
    }
    public  function create(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'ci' => 'required',
        ]);
        $request['empresaId'] = Auth::user()->id;
        $request['password']=Hash::make($request['password']);
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles'));
        return redirect()->back()->with('info','Creado con éxito');

    }
    public function registrar(){
        $roles = Role::get();
        return view('usuarios.crear',compact('roles'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', ['user'=>$user,'roles' => $roles]);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->ci = $request->input('ci');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->empresaId = Auth::user()->id;
        $user->save();

        $user->roles()->sync($request->input('roles'));
        return redirect()->route('usuario.index')->with('act','Actualizado con éxito');
    }
}
