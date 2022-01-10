<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas=Cita::paginate(3);
        $users= DB::table('users')->get();
        $clientes= DB::table('clientes')->get();
        return view('citas.index',compact('citas'),['clientes'=> $clientes,'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /* $clientes = DB::table('clientes')->get();
        $users = DB::table('users')->get();
        return view('citas.index',['clientes'=> $clientes,'users' => $users]);
 */
       
       
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
            'asunto' => 'required', 
            'descripcion' => 'required',   
            'fecha' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'idCliente' => 'required',
            
         ]);
            
       
           
            Cita::create([
                'asunto' => $request ->asunto,
                'descripcion' => $request ->descripcion,   
                'fecha' => $request ->fecha,
                'horaInicio' => $request ->horaInicio,
                'horaFin' => $request ->horaFin,
                'idCliente' => $request ->idCliente,
                'idUsuario' => auth()->user()->id,
            ]);
            
           
            return redirect()->route('citas.index');
        //
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
        $clientes= DB::table('clientes')->get();
        $users= DB::table('users')->get();
        return view('citas.edit',compact('cita'),['clientes'=>$clientes],['users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
        date_default_timezone_set("America/La_Paz");
        $cita->asunto=$request->asunto;
        $cita->descripcion=$request->descripcion;
        $cita->fecha=$request->fecha;
        $cita->horaInicio=$request->horaInicio;
        $cita->horaFin=$request->horaFin;
        $cita->idCliente=$request->idCliente;
        $cita->save();

      /*  activity()->useLog('Pedido')->log('Editar')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $pedido->id;
        $lastActivity->save();*/
        return redirect()->route('citas.index');//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
        $cita->delete();
            
        return redirect()->route('citas.index');
    }

    public function getCitas($idUsuario){
        $listaCitas = new Collection();
        $citas = DB::table('citas')->where('idUsuario', $idUsuario)->get();
        foreach ($citas as $cita) {
            $listaCitas->add($cita);
        }
        return $listaCitas; 
    }

    public function getCitasAll(){
        $listaCitas = new Collection();
        $citas = Citas::all();
        foreach ($citas as $cita) {
            $listaCitas->add($cita);
        }
        return $listaCitas; 
    }

}
