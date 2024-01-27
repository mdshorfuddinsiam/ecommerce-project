<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Auth;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Product;

class OrderController extends Controller
{
    // Confirmed Orders 
	public function pendingOrders(){
		$orders = Order::where('status', 'pending')->orderbyDESC('id')->get();
		return view('backend.orders.pending_orders', compact('orders'));
	}

	// public function pendingOrderDetails($orderId){
	// 	$order = Order::with('division', 'district', 'state', 'user')->where('id', $orderId)->first();
	// 	$orderItems = OrderItem::with('product')->where('order_id', $orderId)->orderbyDESC('id')->get();
	// 	return view('backend.orders.pending_order_details', compact('order', 'orderItems'));
	// }

	public function orderDetails($orderId){
		$order = Order::with('division', 'district', 'state', 'user')->where('id', $orderId)->first();
		$orderItems = OrderItem::with('product')->where('order_id', $orderId)->orderbyDESC('id')->get();
		return view('backend.orders.order_details', compact('order', 'orderItems'));
	}

	// Confirmed Orders 
	public function confirmOrders(){
		$orders = Order::where('status', 'confirm')->orderbyDESC('id')->get();
		return view('backend.orders.confirm_orders', compact('orders'));
	} 

	// Processing Orders
	public function processingOrders(){
		$orders = Order::where('status', 'processing')->orderbyDESC('id')->get();
		return view('backend.orders.processing_orders', compact('orders'));
	} 

	// Picked Orders
	public function pickedOrders(){
		$orders = Order::where('status', 'picked')->orderbyDESC('id')->get();
		return view('backend.orders.picked_orders', compact('orders'));
	} 

	// Shipped Orders
	public function shippedOrders(){
		$orders = Order::where('status', 'shipped')->orderbyDESC('id')->get();
		return view('backend.orders.shipped_orders', compact('orders'));
	} 

	// delivered Orders
	public function deliveredOrders(){
		$orders = Order::where('status', 'delivered')->orderbyDESC('id')->get();
		return view('backend.orders.delivered_orders', compact('orders'));
	} 

	// Cancel Orders
	public function cancelOrders(){
		$orders = Order::where('status', 'cancel')->orderbyDESC('id')->get();
		return view('backend.orders.cancel_orders', compact('orders'));
	} 

  	
  	// Update Orders
  	// pending to confirm
  	public function pandingToConfirm($orderId){

  		Order::findOrFail($orderId)->update(['status' => 'confirm']);

  		$notification = [
			'message' => 'Order Pending Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('pending-orders')->with($notification);

  	}

  	// confirm to processing
  	public function confirmToProcessing($orderId){

  		Order::findOrFail($orderId)->update(['status' => 'processing']);

  		$notification = [
			'message' => 'Order Processing Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('confirm-orders')->with($notification);

  	}

  	// processing to picked
  	public function processingToPicked($orderId){

  		Order::findOrFail($orderId)->update(['status' => 'picked']);

  		$notification = [
			'message' => 'Order Picked Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('processing-orders')->with($notification);

  	}

  	// picked to shipped
  	public function pickedToShipped($orderId){

  		Order::findOrFail($orderId)->update(['status' => 'shipped']);

  		$notification = [
			'message' => 'Order Shipped Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('picked-orders')->with($notification);

  	}

  	// shipped to delivered
  	public function shippedToDelivered($orderId){

  		// // Udemy Logic
  		// $product = OrderItem::where('order_id',$orderId)->get();
  		// 	foreach ($product as $item) {
  		// 	 	Product::where('id',$item->product_id)
  		// 	 			->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
  		// 	} 
  		// // End Udemy Logic

  		$orderItems = OrderItem::with('product')->where('order_id', $orderId)->latest()->get();
  		foreach($orderItems as $row){
  			$quantity = $row->product->product_qty;
  			$row->product->update(['product_qty' => $quantity - $row->qty]);
  		}

  		Order::findOrFail($orderId)->update(['status' => 'delivered']);

  		$notification = [
			'message' => 'Order Delivered Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('shipped-orders')->with($notification);

  	}

  	// delivered to cancel
  	public function deliveredToCancel($orderId){

  		Order::findOrFail($orderId)->update(['status' => 'cancel']);

  		$notification = [
			'message' => 'Order Cancel Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('delivered-orders')->with($notification);

  	}


  	// Admin Invoice Download
  	public function adminInvoiceDownload($orderId){
		$order = Order::with('division', 'district', 'state', 'user')->where('id', $orderId)->first();
		$orderItems = OrderItem::with('product')->where('order_id', $orderId)->orderbyDESC('id')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice', compact('order', 'orderItems'));
		return $pdf->download('invoice.pdf');
	}



}
