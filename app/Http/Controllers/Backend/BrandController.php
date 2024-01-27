<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    
	public function index(){
		return view('backend.brand.index', ['brands' => Brand::latest()->get()]);
	}

	public function store(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'brand_name_en' => 'required|string|max:255|unique:brands',
			'brand_name_bn' => 'required|string|max:255|unique:brands',
			'brand_image' => 'mimes:jpeg,jpg,png,gif|required|max:2048' // max 10000kb
		],[
			'brand_name_en.required' => 'Input Brand Name in English',
			'brand_name_bn.required' => 'Input Brand Name in Bangla',
			'brand_image.required' => 'Image field is Required',
			// 'brand_name_en.unique' => 'Please insert new Brand Name',
		]);

		Brand::addNewBrand($request);
		$notification = [
			'message' => 'Brand Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}

	public function edit($id){
		return view('backend.brand.edit', ['brand' => Brand::find($id)]);
	}

	public function update(Request $request, $id){
		// dd($request->all());
		// dd($id);

		$validated = $request->validate([
			'brand_name_en' => 'required|string|max:255',
			'brand_name_bn' => 'required|string|max:255',
			// 'brand_image' => 'mimes:jpeg,jpg,png,gif|max:2048' // max 10000kb
		],[
			'brand_name_en.required' => 'Input Brand Name in English',
			'brand_name_bn.required' => 'Input Brand Name in Bangla',
			// 'brand_name_en.unique' => 'Please insert new Brand Name',
		]);

		Brand::updateBrand($request, $id);
		$notification = [
			'message' => 'Brand Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('brand.all')->with($notification);
	}

	public function delete($id){
		Brand::deleteBrand($id);
		$notification = [
			'message' => 'Brand successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}

}
