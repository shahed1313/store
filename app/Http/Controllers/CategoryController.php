<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function store(Request $request)  {
        $result=  category::query()
        ->create(['name'=>$request->name]);
      }
}
