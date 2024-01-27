<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class ReturnController extends Controller
{
    
	public function returnRequest(){
		$orders = Order::where('return_order', 1)->where('return_reason', '!=', NULL)->latest()->get();
		return view('backend.return_order.return_request', compact('orders'));
	}


	public function approvedReturnRequest($id){

		Order::findOrFail($id)->update(['return_order' => 2]);

		$notification = [
			'message' => 'Return Order Approved Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}


	public function allApprovedRequest(){
		$orders = Order::where('return_order', 2)->where('return_reason', '!=', NULL)->latest()->get();
		return view('backend.return_order.all_approved_request', compact('orders'));
	}



}
