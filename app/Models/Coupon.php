<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function addNewCoupon($request){
    	// dd($request->all());

    	Coupon::create([
    		'coupon_name' => strtoupper($request->coupon_name),
    		'coupon_discount' => $request->coupon_discount,
    		'coupon_validity' => $request->coupon_validity,
    	]);
    }

    public static function updateNewCoupon($request, $coupon){
    	// dd($request->all());

    	$coupon->update([
    		'coupon_name' => strtoupper($request->coupon_name),
    		'coupon_discount' => $request->coupon_discount,
    		'coupon_validity' => $request->coupon_validity,
    	]);
    }


}
