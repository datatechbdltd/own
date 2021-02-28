<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();;
            $table->foreignId('customer_id')->nullable();;
            $table->double('price');
            $table->longText('description')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->double('vat')->default(0)->comment('in %');
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
        Schema::dropIfExists('incomes');
    }
}
