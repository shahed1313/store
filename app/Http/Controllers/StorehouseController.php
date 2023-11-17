<?php

namespace App\Http\Controllers;

use App\Models\storehouse;
use Illuminate\Http\Request;

class StorehouseController extends Controller
{
    function getmst(Request $request) {
        $result= storehouse::query()
         ->get([]);

       return response()->json([
            $result
         ]);
        }


}
