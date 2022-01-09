<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/* MULTI TENANCY */
/* use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Repositories\HostnameRepository;
use Hyn\Tenancy\Repositories\WebsiteRepository; */



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $tenanName=null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        /* $hostname=app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $fqdn=$hostname->fqdn;
            $this->tenanName=explode(".",$fqdn)[0];
        } */
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //$fqdn = sprintf('%s.%s', $data['fqdn'],env('APP_DOMAIN'));
        /* $fqdn="proyectocrm.test/".$data['fqdn']; */

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            /* 'fqdn' => ['required', 'string', 'max:20',Rule::unique('hostnames')->where(function ($query) use ($fqdn){
                return $query->where('fqdn',$fqdn);
            })], */
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'url'=>"argon/img/theme/Sin-perfil.jpg"
        ])->assignRole('Empresa');
        $empresa=Empresa::create([
            'id_user' => $user->id,
        ]);
        return $user;
    }
 
    protected function registered(Request $request, $user)
    {
        /* $fqdn=sprintf('%s.%s', request('fqdn'),env('APP_DOMAIN'));
        $website=new Website;
        $website->uuid=Str::random(10);
        
        app(WebsiteRepository::class)->create($website);
        $hostname=new Hostname();
        $hostname->fqdn=$fqdn;
        $hostname=app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname,$website);
        $usuario=User::find($user->id);
        $usuario->db=$website->uuid;
        $usuario->save(); */

        /* $fqdn="proyectocrm.test/".request('fqdn');
        //dd($fqdn);
        //$fqdn="proyectocrm.test/".request('fqdn');
        $website = new Website;
        $website->uuid=Str::random(10);
        
        app(WebsiteRepository::class)->create($website);
      
        $hostname = new Hostname;
        $hostname->fqdn=$fqdn;
        $hostname=app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname, $website); */
    }
} 
