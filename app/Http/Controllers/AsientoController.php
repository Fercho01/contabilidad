<?php

namespace App\Http\Controllers;

use App\Asiento;
use Illuminate\Http\Request;

class AsientoController extends Controller
{

    public function index()
    {
        return view('asiento.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'moneda' => 'required',
            'libroDiario_id' => 'required'
        ]);
        // dd($request->estado);
        Asiento::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('asiento.crear');
    }

    public function update(Request $request, $id)
    {
        Asiento::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        Asiento::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
