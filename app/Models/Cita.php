<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table="citas";
    protected $guarded=['id','created_at','updated_at'];

    public function user(){

        return $this->belongsTo(User::class,'id','idUsuario');
    }

    public function cliente(){

        return $this->belongsTo(Cliente::class,'id','idCliente');
    }
}
