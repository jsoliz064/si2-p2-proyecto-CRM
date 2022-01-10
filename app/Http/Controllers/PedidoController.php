<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Cliente;
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
        //
        $pedidos=Pedido::all();
        return view('pedido.index', compact('pedidos'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = DB::table('clientes')->get();
        $productos = DB::table('productos')->get();
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
        $pedido=Pedido::create([
            'nroCliente'=>request('nroCliente'),
            'hora' => date('H:i'),
            'fecha' => date('Y/m/d'),
            'importe'=>0
        ]);

       
        return redirect()->route('pedidos.index'); //show
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
        $clientes = DB::table('clientes')->get();
        return view('pedido.edit',compact('pedido'),['clientes'=>$clientes]);
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

      /*  activity()->useLog('Pedido')->log('Editar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $pedido->id;
        $lastActivity->save();*/
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
        //
        $pedido->delete();
       
        
        return redirect()->route('pedidos.index');
    }
}
