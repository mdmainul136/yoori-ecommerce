<?php

namespace App\Http\Controllers\Admin\Addons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class StoreManagerController extends Controller
{
    public function preference(){
        return view('admin.store-manager.preference');
    }


    public function sellerContact(){
        return view('admin.store-manager.seller_contact');
    }


    public function update(Request $request){

        Toastr::success(__('Successfully Update Setting'));
        return redirect()->back();

    }

}
