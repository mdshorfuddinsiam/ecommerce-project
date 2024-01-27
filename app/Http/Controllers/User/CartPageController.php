<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{

	public function myCartView(){
		return view('frontend.cart.mycart_view');
	}

	public function getMyCartAjax(){
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();

		return response()->json([
			'carts' => $carts,
			'cartQty' => $cartQty,
			'cartTotal' => $cartTotal,
		]);
	}

	public function removeMyCartAjax($rowId){

		if($rowId){
			Cart::remove($rowId);
			// dd($cartItem);

			if(Cart::count() > 0){
				// dd('hi');
				if(Session::has('coupon')){
					$coupon_name = session()->get('coupon')['coupon_name'];
					$coupon = Coupon::where('coupon_name', $coupon_name)->first();

					Session::put('coupon', [
						'coupon_name' => $coupon->coupon_name,
						'coupon_discount' => $coupon->coupon_discount,
						// 'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
		                // 'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
						'discount_amount' => round($coupon->coupon_discount/100 * Cart::total()),
						'total_amount' => round(Cart::total() - $coupon->coupon_discount/100 * Cart::total()),
					]);
				}

				return response()->json([
					'success' => 'Remove My Cart Product Successfully!!',
				]);
			}
			else{
				// dd('hello');
				if(session()->has('coupon')){
					session()->forget('coupon');
				}

				return response()->json([
					'success' => 'Remove My Cart Product Successfully!!',
				]);
			}

		}

		// if(session()->has('coupon')){
		// 	session()->forget('coupon');
		// }
		
	}

	public function incrementMyCartAjax(Request $request, $rowId){
		$product = Cart::get($rowId);
		// dd($product);
		Cart::update($rowId, $product->qty + 1);

		if(Session::has('coupon')){
			$coupon_name = session()->get('coupon')['coupon_name'];
			$coupon = Coupon::where('coupon_name', $coupon_name)->first();

			Session::put('coupon', [
				'coupon_name' => $coupon->coupon_name,
				'coupon_discount' => $coupon->coupon_discount,
				// 'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                // 'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
				'discount_amount' => round($coupon->coupon_discount/100 * Cart::total()),
				'total_amount' => round(Cart::total() - $coupon->coupon_discount/100 * Cart::total()),
			]);
		}

		return response()->json('Increment');
	}

	public function decrementMyCartAjax(Request $request, $rowId){
		$product = Cart::get($rowId);
		// dd($product);
		Cart::update($rowId, $product->qty - 1);

		if(Session::has('coupon')){
			$coupon_name = session()->get('coupon')['coupon_name'];
			$coupon = Coupon::where('coupon_name', $coupon_name)->first();

			Session::put('coupon', [
				'coupon_name' => $coupon->coupon_name,
				'coupon_discount' => $coupon->coupon_discount,
				// 'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                // 'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
				'discount_amount' => round($coupon->coupon_discount/100 * Cart::total()),
				'total_amount' => round(Cart::total() - $coupon->coupon_discount/100 * Cart::total()),
			]);
		}

		return response()->json('Decrement');
	}
    
}
