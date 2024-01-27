<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
	public function addToCartAjax(Request $request, $id){
		// dd($id);
		// dd($request->all());

		// if(session()->has('coupon')){
		// 	session()->forget('coupon');
		// }

		$product = Product::find($id);

		if($product->discount_price == null){
			$price = $product->selling_price;
		}
		else{
			$price = $product->discount_price;
		}

		Cart::add([
			'id' => $id, 
			'name' => $request->product_name, 
			'qty' => $request->qty, 
			'price' => $price, 
			'weight' => 1, 
			'options' => [
				'image' => $product->product_thambnail,
				'color' => $request->color,
				'size' => $request->size,
			],
		]);


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

		// if(session()->has('coupon')){
		// 	session()->forget('coupon');
		// }		

		return response()->json([
			'success' => 'Successfully Added On Your Cart!!',
		]);

	}


	public function addMiniCartAjax(){
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();

		return response()->json([
			'carts' => $carts,
			'cartQty' => $cartQty,
			'cartTotal' => $cartTotal,
		]);
	}


	public function removeMiniCartAjax($rowId){
		Cart::remove($rowId);
		return response()->json([
			'success' => 'Product Remove from Cart!!',
		]);
	}



	// -------------------------------
	public function couponApplyAjax(Request $request){
		// dd($request->all());

		$coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
		// dd($coupon);

		if($coupon){
			Session::put('coupon', [
				'coupon_name' => $coupon->coupon_name,
				'coupon_discount' => $coupon->coupon_discount,
				// 'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                // 'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
				'discount_amount' => round($coupon->coupon_discount/100 * Cart::total()),
				'total_amount' => round(Cart::total() - $coupon->coupon_discount/100 * Cart::total()),
			]);

			return response()->json([
				'success' => 'Coupon Appied Successfully!!',
			]);

		}
		else{
			return response()->json([
				'error' => 'Invalid Coupon!!',
			]);
		}

	}


	public function couponCalAjax(){

		if(session()->has('coupon')){
			return response()->json([
				'subtotal' => Cart::total(),
				'coupon_name' => session()->get('coupon')['coupon_name'],
				'discount_amount' => session()->get('coupon')['discount_amount'],
				'total_amount' => session()->get('coupon')['total_amount'],
			]);
		}
		else{
			return response()->json([
				'total' => Cart::total(),
			]);
		}

	}


	public function removeCouponAjax(){

		if(session()->has('coupon')){
			session()->forget('coupon');
		}
		
		return response()->json([
			'success' => 'Removed Coupon Successfully!!',
		]);
	}



}
