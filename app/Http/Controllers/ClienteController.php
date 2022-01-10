<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Bitacora;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $message=request()->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]); */
        /* $message="xd";
        Mail::to('jsoliz064@gmail.com')->queue(new MessageReceived($message));
        return new MessageReceived($message); */
        $clientes=Cliente::all();
        return view('cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'ci'=>'required',
            'nombre'=>'required',

        ]);

        date_default_timezone_set("America/La_Paz");
        $clientes=Cliente::create([
            'ci'=>request('ci'),
            'nombre'=>request('nombre'),
            'telefono'=>request('telefono'),
            'email'=>request('email'),
            'sexo'=>request('sexo'),
            'estado'=>request('estado'),

        ]);

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"crear",
            'implicado'=>"cliente",
            'id_implicado'=>$clientes->id,
        ]);

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show',compact ('cliente'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'ci'=>'required',
            'nombre'=>'required',

        ]);
        date_default_timezone_set("America/La_Paz");
        $cliente->ci=$request->ci;
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        $cliente->email=$request->email;
        $cliente->sexo=$request->sexo;
        $cliente->save();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"editar",
            'implicado'=>"cliente",
            'id_implicado'=>$cliente->id,
        ]);

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {

        $cliente->delete();
        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"eliminar",
            'implicado'=>"cliente",
            'id_implicado'=>$cliente->id,
        ]);
        return redirect()->route('clientes.index');
    }

    public function getClientes(){
        $listaClientes = new Collection();
        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            $listaClientes->add($cliente);
        }
        return $listaClientes; 
    }

}
