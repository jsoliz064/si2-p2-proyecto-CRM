<?php

namespace App\Http\Controllers;

use App\Models\HojaDocumento;
use App\Models\Documento;

use Illuminate\Http\Request;

class HojaDocumentoController extends Controller
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
    public function index2($documento)
    {
        dd($documento);
        //$hojadocumentos=HojaDocumento::where('id_documento',$documento->id)->get();
        //return view('documentos.hojas',compact('hojadocumentos','documento'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HojaDocumento  $hojaDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(HojaDocumento $hojaDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HojaDocumento  $hojaDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(HojaDocumento $hojaDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HojaDocumento  $hojaDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HojaDocumento $hojaDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HojaDocumento  $hojaDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(HojaDocumento $hojaDocumento)
    {
        //
    }
}
