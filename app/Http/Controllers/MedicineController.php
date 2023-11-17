<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use App\Models\storehouse;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

   function medpost(Request $request)  {
    $request->validate([
        'photo'=> 'required|mimes:png,jpg,pdf',
    ]);
    $photo=upload($request->photo,'photo');
    medicine::query()->create([
        'name'=>$request->name,
        'price'=>$request->price,
        'photo'=> $photo,
        'amount'=> $request->amount,
        'expiry date'=> $request->expiry_date,
        'description'=>$request->description,
        'storehoues_id'=> $request->storehoues_id,
    ]);
   }

   function medget(Request $request) {
    $result= medicine::query()
     ->get(['name','price','photo','description','amount', 'expiry date']);
   return response()->json([
        $result
     ]);
    }




    public function buyMedicine(Request $request)
    {
        $requestedAmount = $request->amount;

        $storehouse = Storehouse::find($request->storehoues_id);
        $availableAmount = $storehouse->amount;
        $storeHouseName = $storehouse->name;
        $Medicineexpiry_date= $storehouse ->expiry_date;
        if ($requestedAmount <= $availableAmount) {
            $medicine = Medicine::create([
                'namemedicines' =>  $storeHouseName ,
                'storehoues_id' => $request->storehoues_id,
                'amount' => $request->amount,
                'price' => $request->price,
                'description'=> $request->description,
                'expiry_date'=> $Medicineexpiry_date,
            ]);

            $storehouse->amount = $availableAmount - $requestedAmount;
            $storehouse->save();

        } else {
            return response()->json(['message' => 'The medicine is not available in the storeHouse.'], 404);
        }
    }

}
