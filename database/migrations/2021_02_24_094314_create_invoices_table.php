<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->string('product_price')->nullable();
            $table->string('service_price')->nullable();
            $table->string('other_price')->nullable();
            $table->longText('product_note')->nullable();
            $table->longText('service_note')->nullable();
            $table->longText('other_note')->nullable();
            $table->double('product_vat')->comment('in %');
            $table->double('service_vat')->comment('in %');
            $table->double('other_vat')->comment('in %');
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
        Schema::dropIfExists('invoices');
    }
}
