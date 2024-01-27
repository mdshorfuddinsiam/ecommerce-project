<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Auth;

use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;

class AllUserController extends Controller
{
    
    // MY Orders
	public function myOrders(){
		$orders = Order::where('user_id', Auth::id())->orderbyDESC('id')->get();
		return view('frontend.user.order.order_view', compact('orders'));
	}

	// MY Order Details
	public function myOrderDetail($orderId){
		$order = Order::with('division', 'district', 'state', 'user')->where('user_id', Auth::id())->where('id', $orderId)->first();
		$orderItems = OrderItem::with('product')->where('order_id', $orderId)->orderbyDESC('id')->get();
		return view('frontend.user.order.order_details', compact('order', 'orderItems'));
	}

	// MY Invoice Download
	public function invoiceDownload($orderId){
		$order = Order::with('division', 'district', 'state', 'user')->where('user_id', Auth::id())->where('id', $orderId)->first();
		$orderItems = OrderItem::with('product')->where('order_id', $orderId)->orderbyDESC('id')->get();

		// return view('frontend.user.order.order_invoice', compact('order', 'orderItems'));
		$pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'orderItems'));
		return $pdf->download('invoice.pdf');
	}

	// MY Return Order
	public function returnOrder(Request $request, Order $order){

		$order->update([
			'return_date' => Carbon::now()->format('d F, Y'),
			'return_reason' => $request->return_reason,
			'return_order' => 1,
		]);

		$notification = [
			'message' => 'Return Request Send Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('my.orders')->with($notification);
	}

	// MY Return Order List
	public function returnOrderList(){
		$orders = Order::where('user_id', Auth::id())->whereStatus('delivered')->where('return_reason', '!=', NULL)->orderbyDESC('id')->get();
		return view('frontend.user.order.return_order_view', compact('orders'));
	}

	// MY Cancel Order List
	public function cancelOrderList(){
		$orders = Order::where('user_id', Auth::id())->where('status', 'cancel')->orderbyDESC('id')->get();
		return view('frontend.user.order.cancel_order_view', compact('orders'));
	}



	// Order Tracking
	public function orderTracking(Request $request){

		$trackingOrder = Order::with('division', 'district')->where('invoice_no', $request->code)->first();

		// echo '<pre>';
		// print_r($trackingOrder);
		// dd($trackingOrder);

		if($trackingOrder){
			return view('frontend.tracking.tracking_order', compact('trackingOrder'));
		}
		else{
			$notification = [
			'message' => 'Invoice Code Is Invalid!!',
			'alert-type' => 'error',
			];
			return redirect()->back()->with($notification);
		}
	}











}
