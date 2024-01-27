<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = 
    [
    	'category_name_en',
    	'category_name_bn',
    	'category_slug_en',
    	'category_slug_bn',
    	'category_icon',
    	'status',
    ];


    protected static $data = [];

    public static function addNewCategory($request){
        // dd($request->all());

        self::$data['category_slug_en'] = strtolower(str_replace(' ', '-', $request->category_name_en));
        self::$data['category_slug_bn'] = str_replace(' ', '-', $request->category_name_bn);
        Category::create(array_merge($request->all(), self::$data));
    }

    public static function updateCategory($request, $category){
        self::$data['category_slug_en'] = strtolower(str_replace(' ', '-', $request->category_name_en));
        self::$data['category_slug_bn'] = str_replace(' ', '-', $request->category_name_bn);
        $category->update(array_merge($request->all(), self::$data));
    }

}
