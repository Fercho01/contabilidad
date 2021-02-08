<?php

namespace App\Http\Controllers;

use App\Librodiario;
use App\Libromayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrodiarioController extends Controller
{
    public function index()
    {
        return view('librosdiarios.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $request['empresa_id'] = Auth::user()->empresaId;
        $librodiario = Librodiario::create($request->all());
        $libromayor = new Libromayor();
        $libromayor->nombre = 'Libro mayor del ' . $request->nombre;
        $libromayor->descripcion = 'Este es un libro mayor que pertence a ' . $request->nombre;
        $libromayor->librodiario_id = $librodiario->id;
        $libromayor->save();
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('librosdiarios.crear');
    }

    public function update(Request $request, $id)
    {
        Librodiario::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        Librodiario::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
