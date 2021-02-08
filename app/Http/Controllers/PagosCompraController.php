<?php

namespace App\Http\Controllers;

use App\PagosCompra;
use Illuminate\Http\Request;

class PagosCompraController extends Controller
{
    public function index()
    {
        return view('pagocompras.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'monto' => 'required',
            'facturaCompra_id' => 'required'
        ]);
        // dd($request->estado);
        PagosCompra::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('pagocompras.crear');
    }

    // public function update(Request $request, $id)
    // {
    //     PagosCompra::where('id', $id)->update($request->all());
    //     return redirect()->back();
    // }

    public function delete($id)
    {
        PagosCompra::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
