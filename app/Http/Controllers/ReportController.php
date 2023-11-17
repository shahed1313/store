<?php

namespace App\Http\Controllers;

use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    function restore(Request $request) {
       report::query()->create([

            'user_id'=>Auth::user()->id,
            'comment_id'=>$request->comment_id,
            'reason'=>$request->reason
        ]);

    }

    function delete(Request $request)  {

        report::query()
        ->where('user_id',Auth::user()->id)

        ->where('id',$request->id)
        ->delete();
        }
}
