<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Models\Blog\BlogPost;
use  App\Models\Blog\BlogCategory;

use Image;

class BlogPostController extends Controller
{

	public function blogPost(){
		$blogPosts = BlogPost::with('blogCategory')->latest()->get();
		return view('backend.blog.post.index', compact('blogPosts'));
	}

	public function blogPostCreate(){
		$blogCategories = BlogCategory::latest()->get();
		return view('backend.blog.post.create', compact('blogCategories'));
	}



    public function abc($xx){
    	dd($xx);
    }

	public function blogPostStore(Request $request){

		// abc($request);

		if($request->hasFile('post_image')){
		    // dd(5);
		    $file = $request->file('post_image');
		    $imageName = 'post_image-'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
		    $directory = 'upload/blog-images/';
		    Image::make($file)->resize(780,433)->save($directory.$imageName);
		    // $file->move($directory, $imageName);
		    $data['post_image'] = $directory.$imageName;
		    $data['post_slug_en'] = strtolower(str_replace(' ', '_', $request->post_title_en));
		    $data['post_slug_bn'] = str_replace(' ', '_', $request->post_title_bn);
		}
		else{
		    $data['post_image'] = '';
		    $data['post_slug_en'] = strtolower(str_replace(' ', '_', $request->post_title_en));
		    $data['post_slug_bn'] = str_replace(' ', '_', $request->post_title_bn);
		}

		BlogPost::create(array_merge($request->all(), $data));

		$notification = [
			'message' => 'Blog Post Added Successfully!!',
			'alert-type' => 'success',
		];
		return redirect()->route('blog.post')->with($notification);
	}


	public function blogPostEdit($id){
		$blogCategories = BlogCategory::orderBy('blog_category_name_en', 'asc')->get();
		$blogPost = BlogPost::find($id);
		return view('backend.blog.post.edit', compact('blogCategories', 'blogPost'));
	}


    public function blogPostUpdate(Request $request, $id){
    	// dd($request->all());
    	// dd($id);

    	$blogPost = BlogPost::find($id);

    	if($request->hasFile('post_image')){
            if(file_exists($blogPost->post_image)){
                unlink($blogPost->post_image);
            }

            $file = $request->file('post_image');
            $imageName = 'post_image-'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
            $directory = 'upload/blog-images/';
            Image::make($file)->resize(780,433)->save($directory.$imageName);
            $imgUrl = $directory.$imageName;

            $data['post_image'] = $imgUrl;
            $data['post_slug_en'] = strtolower(str_replace(' ', '_', $request->post_title_en));
            $data['post_slug_bn'] = str_replace(' ', '_', $request->post_title_bn);
        }
        else{
            $data['post_image'] = $blogPost->post_image;
            $data['post_slug_en'] = strtolower(str_replace(' ', '_', $request->post_title_en));
            $data['post_slug_bn'] = str_replace(' ', '_', $request->post_title_bn);
        }

        $blogPost->update(array_merge($request->all(), $data));
    	$notification = [
    		'message' => 'Post Updated Successfully!!',
    		'alert-type' => 'info',
    	];
    	return redirect()->route('blog.post')->with($notification);
    }


    public function blogPostDelete($id){
        $blogPost = BlogPost::find($id);
        if(file_exists($blogPost->post_image)){
            unlink($blogPost->post_image);
        }

        $blogPost->delete();
    	$notification = [
    		'message' => 'Post Deleted Successfully!!',
    		'alert-type' => 'warning',
    	];
    	return redirect()->back()->with($notification);
    }



    
}
