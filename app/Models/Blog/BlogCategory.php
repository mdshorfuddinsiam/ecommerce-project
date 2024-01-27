<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    
    protected $guarded = [];


    public function blogSubCategory(){
    	return $this->hasMany(blogSubCategory::class, 'blogcategory_id', 'id');
    }

}
