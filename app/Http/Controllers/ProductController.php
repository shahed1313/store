<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

   function store(Request $request)  {

    $request->validate([
        'photo'=> 'required|mimes:png,jpg,pdf',

    ]);
    $photo=upload($request->photo,'photo');

    product::query()->create([
        'name'=>$request->name,
        'price'=>$request->price,
        'category_id'=>$request->category_id,
        'photo'=> $photo,
        'description'=>$request->description
    ]);
   }

   function getproduct(Request $request) {
    $result= product::query()
     ->get(['name','price','photo','description']);

   return response()->json([
        $result
     ]);
    }

   function delete(Request $request)  {
    product::query()
    ->where('name',$request->name)
    ->delete();
   }


function up(Request $request) {
    product::query()
    ->where('id',$request->id)
    ->update([

        'price'=>$request->pric,
    ]);

}

}
