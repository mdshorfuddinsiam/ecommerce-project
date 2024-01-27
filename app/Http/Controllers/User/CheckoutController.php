<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class CheckoutController extends Controller
{
    
	public function checkoutCreate(){

		if(Auth::check()){
			if(Cart::total() > 0){

				return view('frontend.checkout.checkout_create', [
					'carts' => Cart::content(),
					'cartQty' => Cart::count(),
					'cartTotal' => Cart::total(),
					'divisions' => ShipDivision::orderBy('division_name', 'ASC')->get(),
				]);

			}else{
				$notification = array(
			        'message' => 'At Least One Product Add Your Cart!!!',
			        'alert-type' => 'error'
			    );
				return redirect()->to('/')->with($notification);
			}
		}
		else{
			$notification = array(
		        'message' => 'Login Your Account First!!!',
		        'alert-type' => 'error'
		    );
			return redirect()->route('login')->with($notification);
		}

	}


	// ----------- Ajax -------------
	public function districtGetAjax($division_id){
		// dd($division_id);

		$districts = ShipDistrict::where('division_id', $division_id)->orderBy('district_name','ASC')->get();
		return json_encode($districts);
	}
	public function stateGetAjax($district_id){
		// dd($district_id);

		$states = ShipState::where('district_id', $district_id)->orderBy('state_name','ASC')->get();
		return json_encode($states);
	}
	// ----------- End Ajax -------------


	public function checkoutStore(Request $request){
		// dd($request->all());

		$data = $request->all();
		// dd($data);

		if ($request->payment_method == 'stripe'){
			return view('frontend.payment.stripe', [
				'data' => $data,
				'cartTotal' => Cart::total(),
			]);
		}
		elseif ($request->payment_method == 'card'){
			return 'Card';
		}
		else{
			// return 'Cash';
			return view('frontend.payment.cash', [
				'data' => $data,
				'cartTotal' => Cart::total(),
			]);
		}

	}


}
