<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('title')->nullable();
            $table->Text('short_description')->nullable();
            $table->integer('visitor_counter')->default(0);
            $table->double('price')->nullable();
            $table->integer('serial');
            $table->double('offer_in_percent')->nullable();
            $table->boolean('status')->default(0);
            $table->string('image')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('agreement')->nullable();
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
        Schema::dropIfExists('website_products');
    }
}
