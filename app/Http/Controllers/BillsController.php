<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    function getbill(Request $request) {

        //where( 'id',Auth::user()->id,)
        $result= Bills::query()
         ->get(['username','price','name','date of purchase']);

       return response()->json([
            $result
         ]);
        }

}
