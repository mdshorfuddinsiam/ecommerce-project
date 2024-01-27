<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
// use App\Models\MultiImg;

class MultiImg extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static $imageFiles;
    protected static $id;
    protected static $file;
    protected static $oldImg;
    protected static $imageName;
    protected static $directory;
    protected static $path;

    public static function multiImgUpdate($request){
    	// dd($request->all());

    	if($request->hasFile('multi_img')){
    		self::$imageFiles = $request->file('multi_img');
    		foreach(self::$imageFiles as self::$id => self::$file) {
    			self::$oldImg = MultiImg::find(self::$id);
    			if(file_exists(self::$oldImg->photo_name)){
    				unlink(self::$oldImg->photo_name);
    			}
    			self::$imageName = 'multi_img-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            	self::$directory = 'upload/product-images/multi-images/';
            	Image::make(self::$file)->resize(917,1000)->save(self::$directory.self::$imageName);
            	// self::$file->move(self::$directory, self::$imageName);
            	self::$path = self::$directory.self::$imageName;

            	self::$oldImg->update([
            		'photo_name' => self::$path,
            	]);
    		}
    	}

    }


    public static function multiImgDelete($multiImg){
    	if(file_exists($multiImg->photo_name)){
			unlink($multiImg->photo_name);
		}
		$multiImg->delete();
    }



}
