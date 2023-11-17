<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function store(Request $request) {
        comment::query()->create([

            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
            'comment'=>$request->comment

        ]);

    }

    function get(Request $request) {

        $result=comment::query()
        ->where('id',$request->id)
        ->get();

         return $result;

    }

    function delete(Request $request)  {

        comment::query()
        ->where('user_id',Auth::user()->id)

        ->where('id',$request->id)
        ->delete();
        }


        function updatee(Request $request) {
            comment::qurey()
            ->where('user_id',Auth::user()->id)
            ->where('id',$request->id)
            ->update([
                'comment'=>$request->comment,

            ]);

        }


}
