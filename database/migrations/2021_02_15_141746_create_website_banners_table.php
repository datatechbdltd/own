<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('highlight')->nullable();
            $table->text('description')->nullable();
            $table->string('btn_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->integer('serial')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('website_banners');
    }
}
