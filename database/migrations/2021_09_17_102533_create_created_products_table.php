<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('created_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product_listings')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('tag_line_1')->nullable();
            $table->string('tag_line_2')->nullable();
            $table->string('Alc/Vol')->nullable();
            $table->string('Volume')->nullable();
            $table->string('label_image')->nullable();
            $table->string('color')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('created_products');
    }
}
