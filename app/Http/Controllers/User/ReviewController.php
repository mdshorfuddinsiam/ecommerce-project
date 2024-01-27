<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use Auth;

class ReviewController extends Controller
{

	public function reviewStore(Request $request, $product_id){
		// dd($request->all());
		// dd($product_id);

		$request->validate([
	        'quality_rating' => 'in:1,2,3,4,5',
	        'price_rating' => 'in:1,2,3,4,5',
	        'value_rating' => 'in:1,2,3,4,5',
	        'summary' => 'required|string',
	        'comment' => 'required|string',
		]);

		$data['product_id'] = $product_id;
		$data['user_id'] = Auth::id();

		Review::create(array_merge($request->all(), $data));
		$notification = [
			'message' => 'Review Will Approve By Admin!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}




	// Admin Pedning Review
	public function pendingReview(){
		$pendingReviews = Review::with('product', 'user')->where('status', 0)->latest()->get();
		return view('backend.review.pending_review', compact('pendingReviews'));
	}

	// Admin Approve Pedning Review
	public function approvePendingReview($id){
		Review::findOrFail($id)->update(['status' => 1]);

		$notification = [
			'message' => 'Review Approved Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}

	// Admin Published Review
	public function publishReview(){
		$publishReviews = Review::with('product', 'user')->where('status', 1)->latest()->get();
		return view('backend.review.publish_review', compact('publishReviews'));
	}

	// Admin Delete Published Review
	public function deletePublishReview($id){
		Review::findOrFail($id)->delete();

		$notification = [
			'message' => 'Review Deleted Successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}



    
}
