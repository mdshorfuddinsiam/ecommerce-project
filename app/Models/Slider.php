<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static $file;
    protected static $imageName;
    protected static $directory;
    protected static $data = [];


    // ------------------ Supportive functions -----------------
    public static function saveImage($request){
        if($request->hasFile('slider_image')){
            // dd(5);
            self::$file = $request->file('slider_image');
            self::$imageName = 'slider_image-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            self::$directory = 'upload/slider-images/';
            Image::make(self::$file)->resize(870,370)->save(self::$directory.self::$imageName);
            // self::$file->move(self::$directory, self::$imageName);
            self::$data['slider_image'] = self::$directory.self::$imageName;
            return self::$data;
        }
        else{
            self::$data['slider_image'] = '';
            return self::$data;
        }
    }

    public static function updateImage($request){
        if($request->hasFile('slider_image')){
            self::$file = $request->file('slider_image');
            self::$imageName = 'slider_image-'.time().rand(1,1000).'.'.self::$file->getClientOriginalExtension();
            self::$directory = 'upload/slider-images/';
            Image::make(self::$file)->resize(870,370)->save(self::$directory.self::$imageName);
            // self::$file->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        }
    }
    

    // ------------------ Main functions -----------------
    public static function addNewSlider($request){
        // dd($request->all());

        Slider::create(array_merge($request->all(), self::saveImage($request)));
    }

    public static function updateSlider($request, $slider){
        // dd($request->all());
        // dd($slider);

        if($request->hasFile('slider_image')){
            if(file_exists($slider->slider_image)){
                unlink($slider->slider_image);
            }
            self::$data['slider_image'] = self::updateImage($request);
        }
        else{
            self::$data['slider_image'] = $slider->slider_image;
        }

        $slider->update(array_merge($request->all(), self::$data));
    }



}
