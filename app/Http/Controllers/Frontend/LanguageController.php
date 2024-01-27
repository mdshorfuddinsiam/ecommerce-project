<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    
	public function bangla(){
		session()->get('language');
		session()->forget('language');
		session()->put('language', 'bangla');
		return redirect()->back();
	}

	public function english(){
		session()->get('language');
		session()->forget('language');
		session()->put('language', 'english');
		return redirect()->back();
	}

}
