<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('bn_title')->nullable();
            $table->integer('category_id');
            $table->string('image');
            $table->longText('description')->nullable();

            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->text('meta_tags')->nullable();

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
        Schema::dropIfExists('blogs');
    }
}
