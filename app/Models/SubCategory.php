<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = ['_token'];


    protected static $data = [];

    public static function addNewSubCategory($request){
        // dd($request->all());

        self::$data['subcategory_slug_en'] = strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        self::$data['subcategory_slug_bn'] = str_replace(' ', '-', $request->subcategory_name_bn);
        SubCategory::create(array_merge($request->all(), self::$data));
    }

    public static function updateSubCategory($request, $subcategory){
    	// dd($request->all());
    	// dd($subcategory);

        self::$data['subcategory_slug_en'] = strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        self::$data['subcategory_slug_bn'] = str_replace(' ', '-', $request->subcategory_name_bn);
        $subcategory->update(array_merge($request->all(), self::$data));
    }


    public function category(){
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
