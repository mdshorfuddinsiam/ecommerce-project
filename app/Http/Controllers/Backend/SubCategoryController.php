<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index(){
		return view('backend.category.subcategories', [
			'subcategories' => SubCategory::latest()->get(),
			'categories' => Category::orderBy('category_name_en', 'ASC')->get(),
		]);
	}

	public function store(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'category_id' => 'required',
			'subcategory_name_en' => 'required|string|max:255|unique:sub_categories',
			'subcategory_name_bn' => 'required|string|max:255|unique:sub_categories',
		],[
			'category_id.required' => 'Please select a category',
			'subcategory_name_en.required' => 'Input Sub-Category Name in English',
			'subcategory_name_bn.required' => 'Input Sub-Category Name in Bangla',
		]);

		// dd(5);

		SubCategory::addNewSubCategory($request);
		$notification = [
			'message' => 'Sub-Category Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}


	public function edit(SubCategory $subcategory){
		// dd($subcategory);
		// return $subcategory;

		return view('backend.category.subcategory_edit', [
			'subcategory' => $subcategory,
			'categories' => Category::orderBy('category_name_en', 'ASC')->get(),
		]);
	}

	public function update(Request $request, SubCategory $subcategory){
		// dd($request->all());
		// dd($category);

		$validated = $request->validate([
			'category_id' => 'required',
			'subcategory_name_en' => 'required|string|max:255',
			'subcategory_name_bn' => 'required|string|max:255',
		],[
			'category_id.required' => 'Please select a category',
			'subcategory_name_en.required' => 'Input Sub-Category Name in English',
			'subcategory_name_bn.required' => 'Input Sub-Category Name in Bangla',
		]);

		// dd(5);

		SubCategory::updateSubCategory($request, $subcategory);
		$notification = [
			'message' => 'Sub-Category Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('subcategory.all')->with($notification);
	}

	public function delete(SubCategory $subcategory){
		$subcategory->delete();
		$notification = [
			'message' => 'Sub-Category successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}


}
