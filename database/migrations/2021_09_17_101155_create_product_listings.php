<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductListings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_listings', function (Blueprint $table) {
            $table->id();
            $table->string('created_id')->nullable()->comments('customized product id');
            $table->string('color_option')->nullable()->comments('yes/no to enable desable this feature');
            $table->string('other_option')->nullable()->comments('for future use');
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
        Schema::dropIfExists('product_listings');
    }
}
