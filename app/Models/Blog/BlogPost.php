<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function blogCategory(){
    	return $this->belongsTo(blogCategory::class, 'blogcategory_id', 'id');
    }


}
