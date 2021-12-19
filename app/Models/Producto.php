<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Producto extends Model
{
    use HasFactory;
    use UsesTenantConnection;
    protected $table='productos';
    protected $guarded=['id','created_at','updated_at'];
}
