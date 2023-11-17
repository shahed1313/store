<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\medicine;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function mymy(Request $request)  {
        $result = User::query()
        ->where( 'id',Auth::user()->id,)
        ->get(['name','email','photo','wallet','password']);

        return response()->json([
            $result
         ]);
    }

    public function buyM(Request $request)
    {
        $user_id = Auth::user()->id;
        $requestedAmount = $request->amount;

        $medicine = medicine::find($request->medicine_id);
        $availableAmount = $medicine->amount;
        $namemedicines = $medicine->name;
        $Mprice = $medicine->price;
        if ($requestedAmount <= $availableAmount) {
            $Bill = Bills::create([
                'name' =>  $namemedicines ,
                'medicine_id' => $request->medicine_id,
                'amount' => $request->amount,
                'price' => $Mprice,
                'username' => $user_id,
            ]);

            $medicine->amount = $availableAmount - $requestedAmount;
            $medicine->save();

        } else {
            return response()->json(['message' => 'The medicine is not available in the medicine.'], 404);
        }
    }



}
