<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    function shahed(Request $request)  {
        $request->validate([
            'photo'=> 'required|mimes:png,jpg,pdf',
            'pdf'=>'required|mimes:pdf'
        ]);
        $photo=upload($request->photo,'photo');
        $result=image::query()
        ->create([
            'photo' =>$photo,
        ]);

    }
}
