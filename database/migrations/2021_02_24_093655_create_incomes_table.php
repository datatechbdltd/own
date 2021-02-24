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
            $table->foreignId('category_id');
            $table->foreignId('payment_method_id');
            $table->double('amount');
            $table->text('description')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->foreignId('customer_group_id')->nullable();
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
