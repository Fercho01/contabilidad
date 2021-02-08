<?php

namespace App\Http\Controllers;

use App\Libromayor;
use Illuminate\Http\Request;

class LibromayorController extends Controller
{
    public function index()
    {
        return view('librosmayores.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'librodiario_id' => 'required'
        ]);
        Libromayor::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('librosmayores.crear');
    }

    public function update(Request $request, $id)
    {
        Libromayor::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        Libromayor::where('id', $id)->update(['estado'=>1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
