<?php

namespace App\Http\Controllers;

use App\FacturaVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaVentaController extends Controller
{
    public function index()
    {
        return view('facturaventa.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'monto' => 'required',
            'asiento_id' => 'required'
        ]);
        // dd($request->estado);
        $request['empresa_id'] = Auth::user()->empresaId;
        FacturaVenta::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('facturaventa.crear');
    }

    public function update(Request $request, $id)
    {
        FacturaVenta::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        FacturaVenta::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
