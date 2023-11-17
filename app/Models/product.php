<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductUserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded=[];
    //protected $fillable=['name','price','category_id','description','photo'];
    use HasFactory;

    public function category(){

        return $this->belongsTo(category::class);
     }

     public function User(){

        return $this->belongsToMany(User::class,'product_users','product_id');
     }

     public function comment(){

        return $this->hasMany(comment::class);
     }







}
