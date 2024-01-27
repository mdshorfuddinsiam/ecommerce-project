<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{

	public function index(){
		return view('backend.coupon.index', [
			'coupons' => Coupon::orderByDESC('id')->get(),
		]);
	}


	public function store(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'coupon_name' => 'required|string|max:255|unique:coupons',
			'coupon_discount' => 'required',
			'coupon_validity' => 'required',
			// 'coupon_validity' => 'required|date_format:Y-m-d',
		],[
			'coupon_name.required' => 'Coupon Name Must be Required',
			'coupon_discount.required' => 'Coupon Discount Must be Required',
			'coupon_validity.required' => 'Coupon Validity Must be Required',
		]);

		Coupon::addNewCoupon($request);
		$notification = [
			'message' => 'Coupon Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}

	public function edit(Coupon $coupon){
		// dd($coupon);

		return view('backend.coupon.edit', ['coupon' => $coupon]);
	}


	public function update(Request $request, Coupon $coupon){
		// dd($request->all());

		$validated = $request->validate([
			'coupon_name' => 'required|string|max:255|unique:coupons',
			'coupon_discount' => 'required',
			'coupon_validity' => 'required',
			// 'coupon_validity' => 'required|date_format:Y-m-d',
		],[
			'coupon_name.required' => 'Coupon Name Must be Required',
			'coupon_discount.required' => 'Coupon Discount Must be Required',
			'coupon_validity.required' => 'Coupon Validity Must be Required',
		]);

		Coupon::updateNewCoupon($request, $coupon);
		$notification = [
			'message' => 'Coupon Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('coupon.all')->with($notification);
	}


    public function delete(Coupon $coupon){
		$coupon->delete();
		$notification = [
			'message' => 'Coupon successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}


}
