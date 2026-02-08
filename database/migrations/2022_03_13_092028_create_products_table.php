<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bn_name')->nullable();
            $table->integer('category_id');
            $table->integer('menu_type_id')->nullable();
            $table->string('image');
            $table->double('price',10,2);
            $table->double('discount_price',10,2);
            $table->double('price_active')->default(1);
            $table->longText('description')->nullable();
            $table->integer('status')->default(1); // 1=active, 2= Daft , 0=deactive
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
        Schema::dropIfExists('products');
    }
}
