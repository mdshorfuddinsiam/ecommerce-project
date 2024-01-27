<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    
	public function addToWishlistAjax(Request $request, $id){
		// dd($id);

		if(Auth::check()){

			$exist = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->first(); 

			if(!$exist){
				Wishlist::create([
					'user_id' => Auth::id(),
					'product_id' => $id,
				]);
				return response()->json([
					'success' => 'Successfully Added On Your Wishlist!!',
				]);
			}
			else{
				return response()->json([
					'error' => 'Already Exist Your Wishtlist!!',
				]);
			}

		}
		else{
			return response()->json([
				'error' => 'At Fisrt Login Your Account!!',
			]);
		}
	} // end method


	public function wishlistView(){
		return view('frontend.wishlist.wishlist_view');
	} // end method

	public function getWishlistAjax(){
		$wishlists = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
		return response()->json($wishlists);
	} // end method

	public function removeWishlistAjax($id){
		Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
		return response()->json([
			'success' => 'Removed Wishlist Product Successfully!!',
		]);
	} // end method

}
