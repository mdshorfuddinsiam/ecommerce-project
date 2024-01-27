<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $data = [];

    public static function addNewSubSubCategory($request){
    	// dd($request->all());

        self::$data['subsubcategory_slug_en'] = strtolower(str_replace(' ', '-', $request->subsubcategory_name_en));
        self::$data['subsubcategory_slug_bn'] = str_replace(' ', '-', $request->subsubcategory_name_bn);
        SubSubCategory::create(array_merge($request->all(), self::$data));
    }

    public static function updateSubSubCategory($request, $subsubcategory){
    	// dd($request->all());
    	// dd($subsubcategory);

        self::$data['subsubcategory_slug_en'] = strtolower(str_replace(' ', '-', $request->subsubcategory_name_en));
        self::$data['subsubcategory_slug_bn'] = str_replace(' ', '-', $request->subsubcategory_name_bn);
        $subsubcategory->update(array_merge($request->all(), self::$data));
    }



    public function category(){
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function subcategory(){
    	return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
}
