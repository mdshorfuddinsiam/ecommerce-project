<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = 
    [
    	'brand_name_en',
    	'brand_name_bn',
    	'brand_slug_en',
    	'brand_slug_bn',
    	'brand_image',
    	'status',
    ];


    protected static $file;
    protected static $imageName;
    protected static $directory;
    protected static $data = [];
    protected static $brand;

    public static function saveImage($request){
        if($request->hasFile('brand_image')){
            // dd(5);
            self::$file = $request->file('brand_image');
            self::$imageName = 'brand_image-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            self::$directory = 'upload/brand-images/';
            Image::make(self::$file)->resize(300,300)->save(self::$directory.self::$imageName);
            // self::$file->move(self::$directory, self::$imageName);
            self::$data['brand_image'] = self::$directory.self::$imageName;
            self::$data['brand_slug_en'] = strtolower(str_replace(' ', '_', $request->brand_name_en));
            self::$data['brand_slug_bn'] = str_replace(' ', '_', $request->brand_name_bn);
            return self::$data;
            // dd(self::$data);
        }
        else{
            self::$data['brand_image'] = '';
            self::$data['brand_slug_en'] = strtolower(str_replace(' ', '_', $request->brand_name_en));
            self::$data['brand_slug_bn'] = str_replace(' ', '_', $request->brand_name_bn);
            return self::$data;
            // dd(self::$data);
        }
    }

    public static function updateImage($request){
        if($request->hasFile('brand_image')){
            self::$file = $request->file('brand_image');
            self::$imageName = 'brand_image-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            self::$directory = 'upload/brand-images/';
            Image::make(self::$file)->resize(300,300)->save(self::$directory.self::$imageName);
            return self::$directory.self::$imageName;
        }
    }



    public static function addNewBrand($request){
        // dd($request->all());
        Brand::create(array_merge($request->all(), self::saveImage($request)));
    }

    public static function updateBrand($request, $id){
        // dd($request->all());
        // dd($id);

        self::$brand = Brand::find($id);

        if($request->hasFile('brand_image')){
            if(file_exists(self::$brand->brand_image)){
                unlink(self::$brand->brand_image);
            }
            self::$data['brand_image'] = self::updateImage($request);
            self::$data['brand_slug_en'] = strtolower(str_replace(' ', '_', $request->brand_name_en));
            self::$data['brand_slug_bn'] = str_replace(' ', '_', $request->brand_name_bn);
        }
        else{
            self::$data['brand_image'] = self::$brand->brand_image;
            self::$data['brand_slug_en'] = strtolower(str_replace(' ', '_', $request->brand_name_en));
            self::$data['brand_slug_bn'] = str_replace(' ', '_', $request->brand_name_bn);
        }

        self::$brand->update(array_merge($request->all(), self::$data));
    }


    public static function deleteBrand($id){
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->brand_image)){
            unlink(self::$brand->brand_image);
        }
        self::$brand->delete();
    }

}
