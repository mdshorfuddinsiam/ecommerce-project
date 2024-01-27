<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use Image; 
use App\Models\MultiImg;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static $file;
    protected static $imageName;
    protected static $directory;
    protected static $data = [];
    protected static $product;
    protected static $imageFiles;
    // protected static $column = [];
    protected static $path;

    // Save Image
    public static function saveImage($request){
        if($request->hasFile('product_thambnail')){
            // dd(7);
            self::$file = $request->file('product_thambnail');
            self::$imageName = 'product_thambnail-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            self::$directory = 'upload/product-images/thambnail/';
            Image::make(self::$file)->resize(917,1000)->save(self::$directory.self::$imageName);
            // self::$file->move(self::$directory, self::$imageName);
            self::$data['product_thambnail'] = self::$directory.self::$imageName;
            self::$data['product_slug_en'] = strtolower(str_replace(' ', '_', $request->product_name_en));
            self::$data['product_slug_bn'] = str_replace(' ', '_', $request->product_name_bn);
            // self::$data['created_at'] = Carbon::now();
            return self::$data;
            // dd(self::$data);
        }
        else{
            self::$data['product_thambnail'] = '';
            self::$data['product_slug_en'] = strtolower(str_replace(' ', '_', $request->product_name_en));
            self::$data['product_slug_bn'] = str_replace(' ', '_', $request->product_name_bn);
            // self::$data['created_at'] = Carbon::now();
            return self::$data;
            // dd(self::$data);
        }
    }


    // public static function multiCreate($path){
    // 	MultiImg::create([
    // 		'product_id' => self::$product->id,
    // 		'photo_name' => $path,
    // 		// 'created_at' => Carbon::now(),
    // 	]);
    // }
        

    public static function addNewProduct($request){
    	// dd($request->all());
    	

    	// dd(self::saveImage($request));
    	// $record = array_merge($request->all(), self::saveImage($request));
    	// dd($record);
        // Product::create(array_merge($request->all(), self::saveImage($request)));
        self::$product = Product::create(array_merge($request->except('multi_img'), self::saveImage($request)));
        // dd(self::$product->id);


        if($request->hasFile('multi_img')){
            self::$imageFiles = $request->file('multi_img');
            foreach (self::$imageFiles as self::$file) {
            	self::$imageName = 'multi_img-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            	self::$directory = 'upload/product-images/multi-images/';
            	Image::make(self::$file)->resize(917,1000)->save(self::$directory.self::$imageName);
            	// self::$file->move(self::$directory, self::$imageName);
            	self::$path = self::$directory.self::$imageName;

            	// self::multiCreate(self::$path);

			    MultiImg::create([
			    	'product_id' => self::$product->id,
			    	'photo_name' => self::$path,
			    	// 'created_at' => Carbon::now(),
			    ]);
            }
        }


    }


    public static function updateProduct($request, $product){
        // dd($request);
    	self::$data['product_slug_en'] = strtolower(str_replace(' ', '_', $request->product_name_en));
    	self::$data['product_slug_bn'] = str_replace(' ', '_', $request->product_name_bn);
        if(!$request->hot_deals == '1'){
            self::$data['hot_deals'] = '0';
        }
        if(!$request->featured == '1'){
            self::$data['featured'] = '0';
        }
        if(!$request->special_offer == '1'){
            self::$data['special_offer'] = '0';
        }
        if(!$request->special_deals == '1'){
            self::$data['special_deals'] = '0';
        }
    	$product->update(array_merge($request->all(), self::$data));
    }

    public static function thambnailUpdate($request, $product){
    	// dd($request->all());
    	// dd($product);

    	if($request->hasFile('product_thambnail')){
    		if(file_exists($product->product_thambnail)){
    				unlink($product->product_thambnail);
    			}
            self::$file = $request->file('product_thambnail');
            self::$imageName = 'product_thambnail-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            self::$directory = 'upload/product-images/thambnail/';
            Image::make(self::$file)->resize(917,1000)->save(self::$directory.self::$imageName);
            // self::$file->move(self::$directory, self::$imageName);
            self::$data['product_thambnail'] = self::$directory.self::$imageName;

            $product->update(array_merge($request->only('product_thambnail'), self::$data));
        }
        else{
            $product->update([
            	'product_thambnail' => $product->product_thambnail,
            ]);
        }
    }


    public static function thambnailDelete($product){
        // dd($product);
        if(file_exists($product->product_thambnail)){
            unlink($product->product_thambnail);
        }
        $product->update(['product_thambnail' => '']);
    }


    public static function productDelete($product){
    	if(file_exists($product->product_thambnail)){
			unlink($product->product_thambnail);
		}
		$product->delete();
    }



    // protected $with = ['category', 'brand'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


}
