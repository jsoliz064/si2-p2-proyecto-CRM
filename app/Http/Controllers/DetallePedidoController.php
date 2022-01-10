<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function create_detalle(Cliente $cliente){
        $productos=Producto::where('stock','>',0)->get();
        $pedido=Pedido::all()->last();
        $detalle_pedidos=DetallePedido::where('id_pedido',$pedido->id)->get();
        return view('detalle_pedido.create',compact('productos','pedido','cliente','detalle_pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'id_producto'=>'required',
            'cantidad'=>'required',
        ]);
        $producto=Producto::find($request->id_producto);

        $detalle_pedido=DetallePedido::create([
            'id_producto'=>$request->id_producto,
            'id_pedido'=>Pedido::all()->last()->id,
            'cantidad'=>$request->cantidad,
            'importe'=>$request->cantidad*$producto->precio_unidad,
        ]);

        $producto->update([
            'stock'=>$producto->stock-$request->cantidad,
        ]);

        $pedido=Pedido::all()->last();
        $pedido->update([
            'total'=>$detalle_pedido->importe+$pedido->total,
        ]);
        
        $cliente=Cliente::find($request->id_cliente);
        return redirect()->route('detalle.pedido.create',$cliente); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function show(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallePedido $detallePedido)
    {
        $pedido=Pedido::find($detallePedido->id_pedido);
        $producto=Producto::find($detallePedido->id_producto);
        
        $pedido->update([
            'total'=>$pedido->total-$detallePedido->importe,
        ]);

        $producto->update([
            'stock'=>$producto->stock+$detallePedido->cantidad,
        ]);

        $cliente=Cliente::find($pedido->id_cliente);
        $detallePedido->delete();

        return redirect()->route('detalle.pedido.create',$cliente); 

    }
}
