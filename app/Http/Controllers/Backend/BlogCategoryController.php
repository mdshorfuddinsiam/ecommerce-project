<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\BlogCategory;
use Image;

class BlogCategoryController extends Controller
{

	public function blogCategory(){
		$blogCategories = BlogCategory::latest()->get();
		return view('backend.blog.category.category_view', compact('blogCategories'));
	}


	public function blogCategoryStore(Request $request){
		// dd($request->all());

		BlogCategory::create([
			'blog_category_name_en' => $request->blog_category_name_en,
			'blog_category_name_bn' => $request->blog_category_name_bn,
			'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
			'blog_category_slug_bn' => strtolower(str_replace(' ', '-', $request->blog_category_name_bn)),
			'status' => $request->status,
		]);

		$notification = [
			'message' => 'Blog Category Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->back()->with($notification);
	}


	public function blogCategoryEdit($id){
		$blogCategory = BlogCategory::find($id);
		// dd($blogCategory);
		return view('backend.blog.category.category_edit', compact('blogCategory'));
	}


	public function blogCategoryUpdate(Request $request, $id){
		// dd($request->all());

		BlogCategory::findOrFail($id)->update([
			'blog_category_name_en' => $request->blog_category_name_en,
			'blog_category_name_bn' => $request->blog_category_name_bn,
			'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
			'blog_category_slug_bn' => strtolower(str_replace(' ', '-', $request->blog_category_name_bn)),
			'status' => $request->status,
		]);

		$notification = [
			'message' => 'Blog Category Updated Successfully!!',
			'alert-type' => 'info',
		];
		return redirect()->route('blog.category')->with($notification);
	}


	public function blogCategoryDelete($id){
		// dd($request->all());

		BlogCategory::findOrFail($id)->delete();

		$notification = [
			'message' => 'Blog Category Deleted Successfully!!',
			'alert-type' => 'warning',
		];
		return redirect()->back()->with($notification);
	}


    
}
