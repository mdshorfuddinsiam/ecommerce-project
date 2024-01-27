<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    
	public function reportSearch(){
		return view('backend.report.report_search');
	}

	// Date
	public function reportByDate(Request $request){
		// dd($request->all());
		$date = new DateTime($request->date);
		$formatDate = $date->format('d F Y');
		// dd($formatDate);

		$orders = Order::where('order_date', $formatDate)->latest()->get();
		// dd($orders);
		return view('backend.report.report_view', compact('orders'));
	}

	// Month
	public function reportByMonth(Request $request){
		$orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
		return view('backend.report.report_view', compact('orders'));
	}

	// Year
	public function reportByYear(Request $request){
		$orders = Order::where('order_year', $request->year)->latest()->get();
		return view('backend.report.report_view', compact('orders'));
	}




}
