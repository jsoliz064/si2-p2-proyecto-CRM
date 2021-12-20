<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Documento extends Model
{
    use HasFactory;
    use UsesTenantConnection;
    protected $table="documentos";
    protected $guarded=['id','created_at','updated_at'];
}
