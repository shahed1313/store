<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function comment(){

        return $this->belongsTo(comment::class);

     }

     public function user(){

        return $this->belongsTo(User::class);
     }

}
