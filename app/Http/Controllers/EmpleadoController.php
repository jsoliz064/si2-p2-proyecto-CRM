<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=Empleado::all();
        return view('empleados.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
        
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
            'nombre'=>'required',
            'email'=>'required',
            'password'=>'required',
            'ci'=>'required',
            'sexo'=>'required',
        ]);
        date_default_timezone_set("America/La_Paz");
        $id_user=User::create([
            'name' => request('nombre'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'url'=>"argon/img/theme/Sin-perfil.jpg",
        ])->assignRole('Empleado');

        $empleados=Empleado::create([
            'ci'=>request('ci'),
            'telefono'=>request('telefono'),
            'sexo'=>request('sexo'),
            'id_user'=>$id_user->id,
        ]);
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $user=User::find($empleado->id_user);
        return view('empleados.show',compact ('empleado',compact('user')));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $user=User::find($empleado->id_user);
        return view('empleados.edit',compact ('empleado','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        
        $request->validate([
            'nombre'=>'required',
            'email'=>'required',
            'ci'=>'required',
            'sexo'=>'required',
        ]);

        $user=User::find($empleado->id_user);

        date_default_timezone_set("America/La_Paz");
        $empleado->ci=$request->ci;
        $user->name=$request->nombre;
        $empleado->telefono=$request->telefono;
        $empleado->sexo=$request->sexo;

        $user->email=$request->email;
        if ($request->password!=null)
            $user->password=Hash::make($request->password);
        $empleado->save();
        $user->save();

        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $user=User::find($empleado->id_user);
        $empleado->delete();
        $user->delete();
        return redirect()->route('empleados.index');
    }

    public function getEmpleados(){
        $listaEmpleados = new Collection();
        $empleados = Empleado::all();
        foreach ($empleados as $empleado) {
            $listaEmpleados->add($empleado);
        }
        return $listaEmpleados;
    }
}
