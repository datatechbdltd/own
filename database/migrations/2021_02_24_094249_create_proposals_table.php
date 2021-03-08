<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->longText('description')->nullable();
            $table->string('approval_singnature')->nullable();
            $table->string('approval_name')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('invoice_id')->nullable();
            $table->string('budget')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
