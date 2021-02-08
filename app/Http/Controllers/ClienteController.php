<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'ci' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
        ]);
        $request['empresa_id'] = Auth::user()->empresaId;
        Cliente::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('cliente.crear');
    }

    public function update(Request $request, $id)
    {
        Cliente::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        Cliente::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
