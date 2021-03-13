<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflineTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offline_transactions', function (Blueprint $table) {
            $table->id();
            $table->double('amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('image')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('approved_by_id')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->text('comment')->nullable();
            $table->string('purpose')->comment('masking-sms|non-masking-sms|domain|hosting');
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
        Schema::dropIfExists('offline_transactions');
    }
}
