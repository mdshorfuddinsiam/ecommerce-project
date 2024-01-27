<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use Cart;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    
	public function stripeOrder(Request $request){


		// dd($request->all());

		if(session()->has('coupon')){
			$total_amount = session()->get('coupon')['total_amount'];
		}
		else{
			$total_amount = round(Cart::total());
		}


		// Set your secret key. Remember to switch to your live secret key in production.
		// See your keys here: https://dashboard.stripe.com/apikeys
		\Stripe\Stripe::setApiKey('sk_test_51KuyjDKdjtHDQMO1EmRLsFzQ4TWPAux7agS1NinjViXQY6NupQkdJpOycJbR9NfohpWWIokPssX6JQlcmeYEdcVE009F0AoaLo');

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];

		$charge = \Stripe\Charge::create([
			'amount' => $total_amount*100,
			'currency' => 'usd',
			'description' => 'Easy Online Shop',
			'source' => $token,
			'metadata' => ['order_id' => uniqid()],
		]);

		// dd($charge);

		$order = Order::create([
			'user_id' => Auth::id(),
			'division_id' => $request->division_id,
			'district_id' => $request->district_id,
			'state_id' => $request->state_id,
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'post_code' => $request->post_code,
			'notes' => $request->notes,

			'payment_type' => $charge->payment_method,
			'payment_method' => 'Stripe',
			'transaction_id' => $charge->balance_transaction,
			'currency' => $charge->currency,
			'amount' => $total_amount,
			'order_number' => $charge->metadata->order_id,

			'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
			'order_date' => Carbon::now()->format('d F Y'),
			'order_month' => Carbon::now()->format('F'),
			'order_year' => Carbon::now()->format('Y'),
			'status' => 'pending',
		]);


		// Start Send Mail
		$invoice = Order::findOrFail($order->id);
		$data = [
			'invoice_no' => $invoice->invoice_no,
			'amount' => $invoice->amount,
			'name' => $invoice->name,
			'email' => $invoice->email,
		];

		Mail::to($request->email)->send(new OrderMail($data));
		// End Send Mail


		$carts = Cart::content();
		foreach($carts as $cart){
			OrderItem::create([
				'order_id' => $order->id,
				'product_id' => $cart->id,
				'color' => $cart->options->color,
				'size' => $cart->options->size,
				'qty' => $cart->qty,
				'price' => $cart->price,
			]);
		}

		if(session()->has('coupon')){
			session()->forget('coupon');
		}

		Cart::destroy();

		$notification = array(
			'message' => 'Your Order Place Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('dashboard')->with($notification);


	}





}
