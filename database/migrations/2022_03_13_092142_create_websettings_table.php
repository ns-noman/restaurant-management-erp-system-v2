<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websettings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('bn_site_name');
            $table->string('url_name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('footer_logo')->nullable();
            $table->Text('address')->nullable();
            $table->integer('status')->default(1); // 1=active, 2= Daft , 0=deactive
            $table->string('footer_text')->nullable();
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
        Schema::dropIfExists('websettings');
    }
}
