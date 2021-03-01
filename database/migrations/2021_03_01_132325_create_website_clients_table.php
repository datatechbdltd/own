<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_clients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('name');
            $table->string('designation');
            $table->string('image')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_url')->nullable();
            $table->integer('serial')->nullable();
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('website_clients');
    }
}
