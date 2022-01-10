<?php

namespace App\Http\Controllers;

use App\Models\TipoDePago;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class TipoDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_de_pagos=TipoDePago::all();
        return view('tipo_de_pagos.index',compact('tipo_de_pagos'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 
         ]);

        date_default_timezone_set("America/La_Paz");
        $tipo_de_pago=TipoDePago::create([
            'nombre'=>request('nombre'),
        ]);
        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"crear",
            'implicado'=>"tipo de pago",
            'id_implicado'=>$tipo_de_pago->id,
        ]);
        return redirect()->route('tipo_de_pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDePago $tipoDePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDePago $tipoDePago)
    {
        return view('tipo_de_pagos.edit', compact('tipoDePago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDePago $tipoDePago)
    {
        $request->validate([
            'nombre' => 'required', 
         ]);
        date_default_timezone_set("America/La_Paz");
        $tipoDePago->nombre=$request->nombre;
        $tipoDePago->save();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"editar",
            'implicado'=>"tipo de pago",
            'id_implicado'=>$tipoDePago->id,
        ]);
        return redirect()->route('tipo_de_pagos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDePago $tipoDePago)
    {
        $tipoDePago->delete();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"eliminar",
            'implicado'=>"tipo de pago",
            'id_implicado'=>$tipoDePago->id,
        ]);
        return redirect()->route('tipo_de_pagos.index');
    }
}
