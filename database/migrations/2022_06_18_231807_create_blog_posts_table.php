<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('blogcategory_id');
            $table->integer('blogsubcategory_id')->nullable();
            $table->string('post_title_en');
            $table->string('post_title_bn');
            $table->string('post_slug_en');
            $table->string('post_slug_bn');
            $table->text('post_details_en');
            $table->text('post_details_bn');
            $table->string('post_image');
            $table->string('author');
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
        Schema::dropIfExists('blog_posts');
    }
}
