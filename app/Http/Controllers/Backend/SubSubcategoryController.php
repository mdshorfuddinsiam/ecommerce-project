<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubSubCategory;
use App\Models\SubCategory;

class SubSubcategoryController extends Controller
{
    public function index(){
		return view('backend.category.subsubcategories', [
			'subsubcategories' => SubSubCategory::latest()->get(),
			'categories' => Category::orderBy('category_name_en', 'ASC')->get(),
		]);
	}

	public function store(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'category_id' => 'required',
			'subcategory_id' => 'required',
			'subsubcategory_name_en' => 'required|string|max:255|unique:sub_sub_categories',
			'subsubcategory_name_bn' => 'required|string|max:255|unique:sub_sub_categories',
		],[
			'category_id.required' => 'Please select a category',
			'subcategory_id.required' => 'Please select a subcategory',
			'subsubcategory_name_en.required' => 'Input Sub-SubCategory Name in English',
			'subsubcategory_name_bn.required' => 'Input Sub-SubCategory Name in Bangla',
		]);

		// dd(5);

		SubSubCategory::addNewSubSubCategory($request);
		$notification = [
			'message' => 'Sub-SubCategory Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}


	public function edit(SubSubCategory $subsubcategory){
		// dd($subcategory);
		// return $subcategory;

		return view('backend.category.subsubcategory_edit', [
			'subsubcategory' => $subsubcategory,
			'categories' => Category::orderBy('category_name_en', 'ASC')->get(),
			'subcategories' => SubCategory::where('category_id', $subsubcategory->category_id)->orderBy('subcategory_name_en', 'ASC')->get(),
		]);
	}


	public function update(Request $request, SubSubCategory $subsubcategory){
		// dd($request->all());
		// dd($category);

		$validated = $request->validate([
			'category_id' => 'required',
			'subcategory_id' => 'required',
			'subsubcategory_name_en' => 'required|string|max:255',
			'subsubcategory_name_bn' => 'required|string|max:255',
		],[
			'category_id.required' => 'Please select a category',
			'subcategory_id.required' => 'Please select a subcategory',
			'subsubcategory_name_en.required' => 'Input Sub-SubCategory Name in English',
			'subsubcategory_name_bn.required' => 'Input Sub-SubCategory Name in Bangla',
		]);

		// dd(5);

		SubSubCategory::updateSubSubCategory($request, $subsubcategory);
		$notification = [
			'message' => 'Sub-SubCategory Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('subsubcategory.all')->with($notification);
	}

	public function delete(SubSubCategory $subsubcategory){
		$subsubcategory->delete();
		$notification = [
			'message' => 'Sub-SubCategory successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}


	// ----------- Ajax -------------
	public function getSubCategory($cat_id){
		// dd($cat_id);
		$subcat = SubCategory::where('category_id', $cat_id)->orderBy('subcategory_name_en','ASC')->get();
		return json_encode($subcat);
	}
	
	public function getSubSubCategory($subcat_id){
		// dd($subcat_id);
		$subsubcat = SubSubCategory::where('subcategory_id', $subcat_id)->orderBy('subsubcategory_name_en','ASC')->get();
		return json_encode($subsubcat);
	}

	
}
