<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    //
    public function viewPurchase(Request $request)
    {
        $purchases=Purchase::all();
        return view('purchase.view_purchase',compact('purchases'));
    }

    public function editPurchaseStatus($id){
        $Purchase=Purchase::findOrFail($id);

        if($Purchase->status==1){
            $Purchase->status=0;
            $Purchase->save();
        }else{
            $Purchase->status=1;
            $Purchase->save();
        }
       
        return redirect()->back()->with('success','Purchase Updated Successfully');
    }
}
