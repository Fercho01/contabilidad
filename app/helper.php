<?php
function getProveedores()
{
    error_log('Aciedo');
    return \App\Proveedor::where([['empresaId', \Illuminate\Support\Facades\Auth::user()->empresaId], ['estado', 0]])->get();
}

function getUsers()
{
    error_log('Aciedo');
    return \App\User::where('empresaId', \Illuminate\Support\Facades\Auth::user()->empresaId)->get();
}
function getEmpresas()
{
    return \App\Empresa::all();
}

function getLibrosDiarios()
{
    return \App\Librodiario::where('estado', 0)->get();
}

function getLibrosMayores()
{
    return \App\Libromayor::where('estado', 0)->get();
}
function getPedidoCompra()
{
    return \App\PedidoCompra::where('estado',0)->get();
}
function getAsiento()
{
    return \App\Asiento::where('estado', 0)->get();
}
function getFacturaCompra()
{
    return \App\FacturaCompra::where('estado',0)->get();
}
function getPagoCompra()
{
    return \App\PagosCompra::where('estado',0)->get();
}
function getCliente()
{
    return \App\Cliente::where([['empresa_id', \Illuminate\Support\Facades\Auth::user()->empresaId], ['estado', 0]])->get();
}

function getPedidoVenta()
{
    return \App\PedidoVenta::where('estado',0)->get();
}

function getFacturaVenta()
{
    return \App\FacturaVenta::where([['empresa_id', \Illuminate\Support\Facades\Auth::user()->empresaId], ['estado', 0]])->get();
}
function getPagoVenta()
{
    return \App\PagosVenta::where('estado',0)->get();
}
