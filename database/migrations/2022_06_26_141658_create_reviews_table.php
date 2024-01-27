<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->tinyInteger('quality_rating');
            $table->tinyInteger('price_rating');
            $table->tinyInteger('value_rating');
            $table->string('summary');
            $table->text('comment');

            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade'); 

            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('reviews');
    }
}
