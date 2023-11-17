<?php

namespace App\Http\Controllers;

use App\Models\productUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductUserController extends Controller
{
    function store(Request $request)
    {
        // التحقق مما إذا كانت هناك بيانات مطلوبة مفقودة
        if (!$request->has('product_id')) {
            return response()->json(['error' => 'يجب توفير معرف المنتج.'], 422);
        }

        // إنشاء سجل جديد في قاعدة البيانات
        productUser::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'status'=>'0'

        ]);

        return response()->json(['success' => 'تم إنشاء السجل بنجاح.']);
    }


function buyproduct(Request $request)
{
    // التحقق مما إذا كان هناك بيانات مطلوبة مفقودة


    // الحصول على قيمة المحفظة للمستخدم
    $walletValue = Auth::user()->wallet;

    // الحصول على قيمة المنتج المراد شراؤه
    $productValue = 100; // قم بتعديل هذه القيمة وفقًا لقيمة المنتج الفعلية

    // التحقق مما إذا كانت قيمة المحفظة تكفي للشراء
    if ($walletValue < $productValue) {
        return response()->json(['error' => 'قيمة المحفظة غير كافية للشراء.'], 422);
    }

    // تحديث قيمة المحفظة للمستخدم
    Auth::user()->update(['wallet' => $walletValue - $productValue]);

    // تحديث السجل في قاعدة البيانات
    productUser::where('user_id', Auth::user()->id)
        ->update(['status' => '1']);

    return response()->json(['success' => 'تمت عملية الشراء بنجاح.']);
}
}
