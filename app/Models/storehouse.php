<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storehouse extends Model
{
    use HasFactory;
    public function medicine(){

        return $this->hasMany(medicine::class);
     }



}
