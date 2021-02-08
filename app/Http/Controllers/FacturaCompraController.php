<?php

namespace App\Http\Controllers;

use App\FacturaCompra;
use Illuminate\Http\Request;

class FacturaCompraController extends Controller
{
    public function index()
    {
        return view('facturacompras.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'monto' => 'required',
            'asiento_id' => 'required',
            'pedidoCompra_id' => 'required'
        ]);
        // {{-- [ 'descripcion','monto','asiento_id','pedidoCompra_id' ]; --}}
        // dd($request->estado);
        FacturaCompra::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('facturacompras.crear');
    }

    // public function update(Request $request, $id)
    // {
    //     FacturaCompra::where('id', $id)->update($request->all());
    //     return redirect()->back()->with('act','Actualizado con éxito');
    // }

    public function delete($id)
    {
        FacturaCompra::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
