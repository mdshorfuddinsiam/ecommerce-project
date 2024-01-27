<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Blog\BlogPost;
use App\Models\Review;

use App\Models\SubCategory;
use App\Models\SubSubCategory;

class IndexController extends Controller
{
    
	public function index(){

		// $field = session()->get('language') == 'bangla' ? 'product_tags_bn' : 'product_tags_en';
		// dd(array_unique(array_filter(explode(',',implode(',', Product::where('status', 1)->select($field)->pluck($field)->toArray())))));

	    return view('frontend.index', [
	    	'sliders' => Slider::whereStatus(1)->orderBy('id', 'DESC')->limit(3)->get(),
	    	'products' => Product::whereStatus(1)->orderBy('id', 'DESC')->limit(6)->get(),
	    	'featured' => Product::where('featured', '1')->orderBy('id', 'DESC')->limit(6)->get(),
	    	// 'hotDeals' => Product::where('hot_deals', '1')->where('discount_price', '!=', null)->orderBy('id', 'DESC')->limit(3)->get(),
	    	'specialOffer' => Product::where('special_offer', '1')->orderBy('id', 'DESC')->limit(4)->get(),
	    	'specialDeals' => Product::where('special_deals', '1')->orderBy('id', 'DESC')->limit(3)->get(),
	    	'skip_category_0' => Category::skip(0)->first(),
	    	// 'skip_product_0' => Product::where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get(),
	    	'skip_category_1' => Category::skip(1)->first(),
	    	'skip_brand_3' => Brand::skip(3)->first(),
	    	'blogPosts' => BlogPost::latest()->get(),
	    ]);
	}

	public function userLogout(){
		Auth::logout();
		return redirect()->route('login');
	}

	public function userProfile(){
		// $id = Auth::user()->id;
		// $user = User::find($id);
		// // $user = Auth::user();
		// // dd($user);

		// return view('frontend.profile.user_profile', compact('user'));
		return view('frontend.profile.user_profile');
	}

	public function userProfileUpdate(Request $request){
		// dd($request->all());
		// return $request->all();

		$validated = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users',
			'phone' => 'required|string|max:15',
			'profile_photo_path' => 'mimes:jpeg,jpg,png,gif|max:2048' // max 10000kb
			// 'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
		]);

		$updateData = Auth::user();
    	User::userProfileUpdate($request, $updateData);

    	$notification = array(
            'message' => 'User Profile Successfully Updated!!!',
            'alert-type' => 'success'
        );
    	return redirect()->route('user.profile')->with($notification);
	}


	public function userChangePassword(){
		return view('frontend.profile.change_password');
	}


	public function userPasswordUpdate(Request $request){
		// dd($request->all());

		$validated = $request->validate([
			'oldpassword' => 'required|string',
			'password'    => 'required|string|min:6|different:oldpassword',
			'password_confirmation' => 'required|same:password|string|min:6|',
		]);

		return User::userPasswordUpdate($request);
	}


	public function productDetails(Product $product, $slug){
		return view('frontend.product.product_details', [
			'product' => $product,
			'multiImages' => MultiImg::where('product_id', $product->id)->get(),
			'product_color_en' => explode(',', $product->product_color_en),
			'product_color_bn' => explode(',', $product->product_color_bn),
			'product_size_en' => explode(',', $product->product_size_en),
			'product_size_bn' => explode(',', $product->product_size_bn),
			'upsellProducts' => Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->whereStatus(1)->limit(6)->get(),
			'reviews' => Review::with('user', 'product')->where('product_id', $product->id)->whereStatus(1)->limit(5)->get(),
		]);
	}


	public function tagWiseProduct($tag){
		// dd($tag);

		// $data = Product::where('product_tags_en', 'LIKE', '%'.$tag.'%')->latest()->get();
		// dd($data);

		return view('frontend.tag.tags_view', [
			'tagWiseProduct' => Product::where('product_tags_en', 'LIKE', '%'.$tag.'%')->orWhere('product_tags_bn', 'LIKE', '%'.$tag.'%')->whereStatus(1)->latest()->paginate(2),
			// 'tagWiseProduct' => Product::where('product_tags_en', 'LIKE', '%'.$tag.'%')->orWhere('product_tags_bn', 'LIKE', '%'.$tag.'%')->whereStatus(1)->latest()->get(),
		]);
	}


	public function subCatProduct($subcat_id, $slug){
		// dd($subcat_id);
		// dd($slug);

		return view('frontend.product.subcategory_view', [
			'products' => Product::where('subcategory_id', $subcat_id)->whereStatus(1)->latest()->paginate(3),
			'breadSubCat' => SubCategory::with('category')->where('id', $subcat_id)->whereStatus(1)->first(),
		]);
	}


	public function subSubCatProduct($subsubcat_id, $slug){
		// dd($subsubcat_id);
		// dd($slug);

		return view('frontend.product.subsubcategory_view', [
			'products' => Product::where('subsubcategory_id', $subsubcat_id)->whereStatus(1)->latest()->paginate(2),
			'breadSubSubCat' => SubSubCategory::with('category', 'subcategory')->where('id', $subsubcat_id)->whereStatus(1)->first(),
		]);
	}


	public function productViewAjax($id){
		// dd($id);

		$product = Product::with('category', 'brand')->find($id);
		if(session()->get('language') == 'bangla'){
			$product_color = explode(',', $product->product_color_bn);
			$product_size = explode(',', $product->product_size_bn);
		}
		else{
			$product_color = explode(',', $product->product_color_en);
			$product_size = explode(',', $product->product_size_en);
		}
		
		return response()->json([
			'product' 	=> $product,
			'color' 	=> $product_color,
			'size' 		=> $product_size,
		]);
	}



	// ----- product search ------
	public function productSearch(Request $request){
		// dd($request->all());

		$request->validate([
			'search' => 'required|string',
		]);

		$categories = Category::orderBy('category_name_en')->get();
		$products = Product::where('product_name_en', 'LIKE', "%$request->search%")->orWhere('product_name_bn', 'LIKE', "%$request->search%")->whereStatus(1)->latest()->paginate(3);
		// dd($products);

		return view('frontend.product.search', compact('products', 'categories'));
	}
	// ----- end product search -----


	// ----- advance serach product ------
	public function searchProduct(Request $request){
		// return $request;
		// return $request->all();
		// dd($request->all());

		$request->validate([
			'search' => 'required|string',
		]);

		$products = Product::where('product_name_en', 'LIKE', "%$request->search%")->orWhere('product_name_bn', 'LIKE', "%$request->search%")->whereStatus(1)->select('product_name_en', 'product_thambnail', 'id', 'product_slug_en')->latest()->limit(5)->get();
		// dd($products);

		// return response()->json([
		// 	'products' => $products,
		// ]);

		return view('frontend.product.advance_search', compact('products'));

	}
	// ----- end advance serach product -----





}
