<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
		return view('backend.category.index', ['categories' => Category::latest()->get()]);
	}

	public function store(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'category_name_en' => 'required|string|max:255|unique:categories',
			'category_name_bn' => 'required|string|max:255|unique:categories',
			'category_icon' => 'required',
		],[
			'category_name_en.required' => 'Input Category Name in English',
			'category_name_bn.required' => 'Input Category Name in Bangla',
			'category_icon.required' => 'Icon field is Required',
			// 'brand_name_en.unique' => 'Please insert new Brand Name',
		]);

		Category::addNewCategory($request);
		$notification = [
			'message' => 'Category Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}

	public function edit(Category $category){
		// dd($category);
		// return $category;

		return view('backend.category.edit', ['category' => $category]);
	}

	public function update(Request $request, Category $category){
		// dd($request->all());
		// dd($category);

		$validated = $request->validate([
			'category_name_en' => 'required|string|max:255',
			'category_name_bn' => 'required|string|max:255',
			'category_icon' => 'required',
		],[
			'category_name_en.required' => 'Input Category Name in English',
			'category_name_bn.required' => 'Input Category Name in Bangla',
			'category_icon.required' => 'Icon field is Required',
		]);

		Category::updateCategory($request, $category);
		$notification = [
			'message' => 'Category Updated Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('category.all')->with($notification);
	}

	public function delete(Category $category){
		$category->delete();
		$notification = [
			'message' => 'Category successfully deleted!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}

}
