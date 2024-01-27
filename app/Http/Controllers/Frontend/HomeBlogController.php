<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Models\Blog\BlogPost;
use  App\Models\Blog\BlogCategory;
use  App\Models\Blog\BlogSubCategory;

class HomeBlogController extends Controller
{
    
	public function blogListView(){
		// $blogPosts = BlogPost::with('blogCategory')->whereStatus(1)->latest()->get();
		$blogPosts = BlogPost::with('blogCategory')->latest()->get();
		$blogCategories = BlogCategory::with('blogSubCategory')->latest()->get();
		// $blogCategories = BlogCategory::latest()->get();
		return view('frontend.blog.blog_list', compact('blogPosts', 'blogCategories'));
	}


	public function blogDetails($id){
		$blogPost = BlogPost::with('blogCategory')->find($id);
		$blogCategories = BlogCategory::with('blogSubCategory')->latest()->get();
		return view('frontend.blog.blog_details', compact('blogPost', 'blogCategories'));
	}


}
