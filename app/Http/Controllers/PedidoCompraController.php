<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\PedidoCompra;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoCompraController extends Controller
{
    public  function  index(){
        return view('pedidoCompras.lista');
    }
    public  function registrar(){
        return view('pedidoCompras.crear');
    }
    // 'id_empresa','id_proveedor'];
    public function create(Request $request){
        $this->validate($request,[
            'descripcion' =>'required',
            'id_proveedor' => 'required',
        ]);
        $request['id_empresa'] = Auth::user()->empresaId;
        PedidoCompra::create($request->all());
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function update(Request $request,$id)
    {
        PedidoCompra::where('id', $id)->update($request->all());
        return redirect()->back()->with('act','Actualizado con éxito');
    }
    public function delete($id){
        PedidoCompra::where('id', $id)->update(['estado' => 1]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
