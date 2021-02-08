<?php

namespace App\Http\Controllers;

use App\PagosVenta;
use Illuminate\Http\Request;

class PagosVentaController extends Controller
{
    public function index()
    {
        return view('pagoventas.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'monto' => 'required',
            'facturaVenta_id' => 'required'
        ]);
        // dd($request->estado);
        PagosVenta::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('pagoventas.crear');
    }

    public function update(Request $request, $id)
    {
        PagosVenta::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        PagosVenta::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
