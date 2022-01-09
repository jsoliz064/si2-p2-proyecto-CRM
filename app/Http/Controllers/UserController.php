<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = DB::table('users')
        ->join('model_has_roles', 'model_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('users.*', 'roles.name as roles_name')
        ->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // date_default_timezone_set("America/La_Paz");
       //return $request;
       $users=User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => password_hash($request['password'],PASSWORD_DEFAULT),
        //'password' =>$request['password'], no oculta contraseña
    ]);
    
    //se agrega un rol al usuario
    if($request->roles > 0){
        $users->roles()->sync($request->roles);
        $users->save();
    }

    return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }
    public function show2()
    {
        $user=User::find(auth()->user()->id);
        return view('user.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user', 'roles') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         //actualiza nombre
         if($user->name <> $request->name){
            $user->name = $request->name;
        }
        //actualiza contraseña
        if($request->password <> ''){
            $user->password = bcrypt($request->password);
        }

        if($user->email <> $request->email)
            $user->email = $request->email;
        //actualiza los roles
        if($request->roles > 0){
            $user->roles()->sync($request->roles);
        }           
        $user->save(); //guardar cambios de usuario 
        return redirect()->route('admin.users.edit', $user)->with('info', 'se actualizo el usuario correctamente');;
    }
    public function update2(Request $request)
    {
        $user=User::find(auth()->user()->id);
       //actualiza nombre
       if($user->name <> $request->name){
            $user->name = $request->name;
        }
        //actualiza email
        if($user->email <> $request->email){
            $user->email = $request->email;
        }
        //actualiza contraseña
        if($request->password <> ''){
            $user->password =password_hash($request->password,PASSWORD_DEFAULT);
        }

        $user->save();
        return redirect()->route('user.show');
    }
    public function changeProfile(Request $request)
    {
        $user=User::find(auth()->user()->id);
        date_default_timezone_set("America/La_Paz");
        if ($request->url!==null){
            //valida que cumpla las condiciones sgtes
            $request->validate([
                'url'=>'required|image|max:10000'
            ]);
            $ruta = "public".$user->url;
            if ($user->url<>"argon/img/theme/Sin-perfil.jpg"){
                if (file_exists("../".$ruta)){
                    unlink("../".$ruta);
                }
            }
           
            $imagenes=$request->file('url')->store('public/empresas');
            $url=Storage::url($imagenes);
            $user->url=$url;
            $user->save(); //guardar cambios de usuario 
        }          
        return redirect()->route('profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $ruta = "public".$user->url;
        if ($user->url<>"argon/img/theme/Sin-perfil.jpg"){
            if (file_exists("../".$ruta)){
                unlink("../".$ruta);
            }
        }
        $user->delete();
        
        return redirect()->route('admin.users.index');
    }

    /* API FLUTTER METODS USERS*/
    public function login_app(Request $request) {
        $email="admin@gmail.com";
        $password="12345678";

        /* $email=$request->email;
        $password=$request->password; */

        $user=User::where('email',$email)->get()->first();
        if (password_verify($password,$user->password)){
            return $user->id;    
        }
    }
}
