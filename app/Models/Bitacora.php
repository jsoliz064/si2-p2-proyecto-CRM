<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Bitacora extends Model
{
    use HasFactory;
    use UsesTenantConnection;
    protected $table="bitacoras";
    protected $guarded=['id','created_at','updated_at'];
}
