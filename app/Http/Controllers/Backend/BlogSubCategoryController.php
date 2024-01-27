<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\BlogSubCategory;
use App\Models\Blog\BlogCategory;

class BlogSubCategoryController extends Controller
{
    
	public function blogSubCat(){
		$blogCategories = BlogCategory::orderBy('blog_category_name_en', 'asc')->get();
		$blogSubCategories = BlogSubCategory::with('blogCategory')->latest()->get();
		return view('backend.blog.category.subcategory_view', compact('blogSubCategories', 'blogCategories'));
	}


	public function blogSubCatStore(Request $request){
		// dd($request->all());

		BlogSubCategory::create([
			'blogcategory_id' => $request->blogcategory_id,
			'blog_subcategory_name_en' => $request->blog_subcategory_name_en,
			'blog_subcategory_name_bn' => $request->blog_subcategory_name_bn,
			'blog_subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->blog_subcategory_name_en)),
			'blog_subcategory_slug_bn' => strtolower(str_replace(' ', '-', $request->blog_subcategory_name_bn)),
			'status' => $request->status,
		]);

		$notification = [
			'message' => 'Blog Sub-Category Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}


	public function blogSubCatEdit($id){
		$blogSubCategory = BlogSubCategory::find($id);
		$blogCategories = BlogCategory::orderBy('blog_category_name_en', 'asc')->get();
		return view('backend.blog.category.subcategory_edit', compact('blogSubCategory', 'blogCategories'));
	}


	public function blogSubCatUpdate(Request $request, $id){
		// dd($request->all());

		BlogSubCategory::findOrFail($id)->update([
			'blogcategory_id' => $request->blogcategory_id,
			'blog_subcategory_name_en' => $request->blog_subcategory_name_en,
			'blog_subcategory_name_bn' => $request->blog_subcategory_name_bn,
			'blog_subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->blog_subcategory_name_en)),
			'blog_subcategory_slug_bn' => strtolower(str_replace(' ', '-', $request->blog_subcategory_name_bn)),
			'status' => $request->status,
		]);

		$notification = [
			'message' => 'Blog Sub-Category Updated Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('blog.subcategory')->with($notification);
	}


	public function blogSubCatDelete($id){
		// dd($request->all());

		BlogSubCategory::findOrFail($id)->delete();

		$notification = [
			'message' => 'Blog Category Deleted Successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}



}
