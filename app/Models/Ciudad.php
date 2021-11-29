<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table="ciudads";
    protected $guarded=['id','created_at','updated_at'];
}
