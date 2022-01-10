<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Bitacora;
use App\Models\DetallePedido;
use App\Models\TipoDePago;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_de_pagos=TipoDePago::all();
        $pedidos=Pedido::where('estado',"NO ENTREGADO")->get();
        return view('pedido.index', compact('pedidos','tipo_de_pagos'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('pedido.create',['clientes'=> $clientes,'productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'id_cliente'=>'required'
        ]);
        $cliente=Cliente::find($request->id_cliente);
        $pedido=Pedido::create([
            'id_cliente'=>request('id_cliente'),
            'total'=>0,
            'estado'=>"NO ENTREGADO"
        ]);

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"crear",
            'implicado'=>"pedidos",
            'id_implicado'=>$pedido->id,
        ]);

       
        return redirect()->route('detalle.pedido.create',$cliente); //show
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
       $detallePedido= DB::table('detalle_pedidos')->where('pedido_id',$pedido->id)->get();
       
        return view('pedido.show',compact ('detalle_pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
        $cliente = Cliente::find($pedido->id_cliente);
        //return view('pedido.edit',compact('pedido'),['clientes'=>$clientes]);
        return redirect()->route('detalle.pedido.create',$cliente); //show

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
        date_default_timezone_set("America/La_Paz");
        $pedido->nroCliente=$request->nroCliente;
        $pedido->importe=$request->importe;
        $pedido->save();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"editar",
            'implicado'=>"pedidos",
            'id_implicado'=>$pedido->id,
        ]);

        return redirect()->route('pedidos.index');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $detalle_pedidos=DetallePedido::where('id_pedido',$pedido->id)->get();
        if ($detalle_pedidos) {
            foreach($detalle_pedidos as $detalle_pedido){
                $dato=Producto::find($detalle_pedido->id_producto);
                $dato->update([
                    'stock'=>$dato->stock+$detalle_pedido->cantidad,
                ]);
            }
        }        
        $pedido->delete();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"eliminar",
            'implicado'=>"pedidos",
            'id_implicado'=>$pedido->id,
        ]);
        return redirect()->route('pedidos.index');
    }
}
