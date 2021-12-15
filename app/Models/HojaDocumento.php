<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaDocumento extends Model
{
    use HasFactory;
    protected $table="hoja_documentos";
    protected $guarded=['id','created_at','updated_at'];
}
