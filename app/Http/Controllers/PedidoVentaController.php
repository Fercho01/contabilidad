<?php

namespace App\Http\Controllers;

use App\PedidoVenta;
use Illuminate\Http\Request;

class PedidoVentaController extends Controller
{
    public function index()
    {
        return view('pedidoVenta.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'cliente_id' => 'required'
        ]);
        // dd($request->cliente_id);
        PedidoVenta::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('pedidoVenta.crear');
    }

    public function update(Request $request, $id)
    {
        PedidoVenta::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        PedidoVenta::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
