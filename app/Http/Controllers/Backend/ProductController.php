<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;

class ProductController extends Controller
{
    

	public function index(){
		return view('backend.product.index', [
			'products' => Product::latest()->get(),
		]);
	}

	public function create(){
		
		$data['brands'] = Brand::select('id','brand_name_en')->latest()->get();
		$data['categories'] = Category::select('id','category_name_en')->latest()->get();
		return view('backend.product.create', $data);
	}

	public function store(Request $request){
		// dd($request->all());

		Product::addNewProduct($request);
		$notification = [
			'message' => 'Product Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('product.all')->with($notification);
	}

	public function edit(Product $product){
		$brands = Brand::select('id', 'brand_name_en')->get();
		$categories = Category::select('id', 'category_name_en')->get();
		$subcategories = SubCategory::where('category_id', $product->category_id)->select('id', 'subcategory_name_en')->get();
		$subsubcategories = SubSubCategory::where('category_id', $product->category_id)->where('subcategory_id', $product->subcategory_id)->select('id', 'subsubcategory_name_en')->get();
		$product = $product;
		$multiImages = MultiImg::where('product_id', $product->id)->get();
		return view('backend.product.edit', compact('brands','categories','subcategories','subsubcategories','product','multiImages'));
	}

	public function update(Request $request, Product $product){
		// dd($request->all());
		// dd($product);

		Product::updateProduct($request, $product);
		$notification = [
			'message' => 'Product Updated Without Image Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('product.all')->with($notification);
	}


	public function productImageUpdate(Request $request){
		// dd($request->all());

		MultiImg::multiImgUpdate($request);
		$notification = [
			'message' => 'Product Image Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}


	public function thambnailUpdate(Request $request, Product $product){
		// dd($request->all());

		Product::thambnailUpdate($request, $product);
		$notification = [
			'message' => 'Product Thambnail Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}


	public function productImageDelete(MultiImg $multiImg){
		// dd($multiImg);

		MultiImg::multiImgDelete($multiImg);
		$notification = [
			'message' => 'Product Image Deleted Successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}

	public function productThambnailDelete(Product $product){
		// dd($product);

		Product::thambnailDelete($product);
		$notification = [
			'message' => 'Product Thambnail Deleted Successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}


	public function delete(Product $product){
		// dd($product);

		Product::productDelete($product);
		$multiImges = MultiImg::where('product_id', $product->id)->get();
		foreach($multiImges as $img){
	    	if(file_exists($img->photo_name)){
				unlink($img->photo_name);
			}
			$img->delete();
		}

		$notification = [
			'message' => 'Product Deleted With Image Successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}


	public function active(Product $product){

		$product->update([
			'status' => 1,
		]);

		$notification = [
			'message' => 'Product Status Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}

	public function inactive(Product $product){

		$product->update([
			'status' => 0,
		]);

		$notification = [
			'message' => 'Product Status Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->back()->with($notification);
	}




	// Product Stock
	public function productStock(){
		$products = Product::latest()->get();
		return view('backend.product.product_stock', compact('products'));
	}



}
