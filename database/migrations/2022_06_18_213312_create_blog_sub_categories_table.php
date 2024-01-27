<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('blogcategory_id');
            $table->string('blog_subcategory_name_en');
            $table->string('blog_subcategory_name_bn');
            $table->string('blog_subcategory_slug_en');
            $table->string('blog_subcategory_slug_bn');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_sub_categories');
    }
}
