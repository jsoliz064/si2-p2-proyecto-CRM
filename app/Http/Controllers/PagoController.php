<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Pedido;
use App\Models\TipoDePago;
use App\Models\Bitacora;
use App\Models\DetallePedido;
use App\Models\Cliente;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos=Pago::all();
        return view('pagos.index',compact('pagos'));
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
    public function create_pago(Pedido $pedido)
    {
        $tipo_de_pagos=TipoDePago::all();
        return view('pagos.create',compact ('pedido','tipo_de_pagos'));
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
    }
    public function store_pago(Request $request,Pedido $pedido)
    {
        date_default_timezone_set("America/La_Paz");
        $request->validate([
            'id_tipopago'=>'required'
        ]);
        $pago=Pago::create([
            'id_pedido'=>$pedido->id,
            'id_tipopago'=>$request->id_tipopago,            
        ]);

        $pedido->update([
            'estado'=>"ENTREGADO"
        ]);

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"crear",
            'implicado'=>"pagos",
            'id_implicado'=>$pago->id,
        ]);
        return redirect()->route('pagos.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        $pedido=Pedido::find($pago->id_pedido);
        $detalle_pedidos=DetallePedido::where('id_pedido',$pedido->id)->get();
        $cliente=Cliente::find($pedido->id_cliente);
        return view('pagos.show',compact ('pedido','detalle_pedidos','cliente'));
    }
    public function send_factura(Pedido $pedido)
    {
        /* $message=request()->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]); */
        $message=$pedido;
        $cliente=Cliente::find($pedido->id_cliente);
        Mail::to($cliente->email)->queue(new MessageReceived($message));
        //return new MessageReceived($message);
        return redirect()->route('pagos.index')->with('info', 'El correo ha sido enviado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        $pedido=Pedido::find($pago->id_pedido);
        $pedido->update([
            'estado'=>"NO ENTREGADO"
        ]);
        $pago->delete();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"eliminar",
            'implicado'=>"pagos",
            'id_implicado'=>$pago->id,
        ]);
        return redirect()->route('pagos.index');
    }
}
