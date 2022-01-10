<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Bitacora;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $noticias= Noticia::all();
        return view('noticia.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        
        return view('noticia.create');
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
        $noticia=Noticia::create([
            'descripcion'=>request('descripcion'),
            'hora' => date('H:i'),
            'fecha' => date('Y/m/d'),
            
        ]);

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"crear",
            'implicado'=>"noticias",
            'id_implicado'=>$noticia->id,
        ]);
       
        return redirect()->route('noticias.index'); //show
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
        return view('noticia.show',compact ('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
        return view('noticia.edit',compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
        date_default_timezone_set("America/La_Paz");
        $noticia->descripcion=$request->descripcion;
      
        
        $noticia->save();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"editar",
            'implicado'=>"noticias",
            'id_implicado'=>$noticia->id,
        ]);
        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
        $noticia->delete();
        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"eliminar",
            'implicado'=>"noticias",
            'id_implicado'=>$noticia->id,
        ]);      
        
        return redirect()->route('noticias.index');
    }
}
