<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('add_by_id')->nullable()->comment('who add this lead');
            $table->foreignId('update_by_id')->nullable()->comment('who update this lead');
            $table->foreignId('category_id')->default(1);
            $table->foreignId('service_id')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('thana_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable()->comment('Male|Female|Other');
            $table->string('is_married')->nullable()->comment('Yes|No');
            $table->string('company_name')->nullable();
            $table->string('profession')->nullable();
            $table->string('address')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_facebook_page')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
