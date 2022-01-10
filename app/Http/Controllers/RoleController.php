<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Bitacora;

class RoleController extends Controller
{
    //solo tienen acceso los admin
    public function __construct()
    {                   
        //$this->middleware('can:Admin'); //bloque todos los metodos de la class
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //atributos que seran requeridos al momento de insertar
        $request->validate([
            'name' => 'required'
        ]);
        $role = Role::create(['name' => $request->name]); //creamos un roll
        
        $role->permissions()->sync($request->permissions);//asignamos los permisos al rol creado

        // activity()->useLog('Usuario')->log('Crear')->subject();
        // $lastActivity = Activity::all()->last();
        // $lastActivity->subject_id = $users->id;
        // $lastActivity->save();

        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"crear",
            'implicado'=>"roles",
            'id_implicado'=>$role->id,
        ]);

        return redirect()->route('admin.roles.edit', $role)->with('info','El rol se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);//asignamos los permisos al rol creado
        
        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"editar",
            'implicado'=>"roles",
            'id_implicado'=>$role->id,
        ]);
        return redirect()->route('admin.roles.edit', $role)->with('info','El rol se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $bitacoras=Bitacora::create([
            'user'=>auth()->user()->name,
            'accion'=>"eliminar",
            'implicado'=>"roles",
            'id_implicado'=>$role->id,
        ]);

        return redirect()->route('admin.roles.index')->with('info', 'El rol se eliminó con éxito');
    }
}
