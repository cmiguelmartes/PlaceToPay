<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_transaction_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->text('bank_url');
            $table->string('trazability_code',50);
            $table->integer('transaction_cycle');
            $table->integer('transaction_id');
            $table->string('session_id',40);
            $table->string('bank_currency',3);
            $table->float('bank_factor');
            $table->integer('response_code');
            $table->string('response_reasonCode',10);
            $table->text('response_reason_text');
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
        Schema::dropIfExists('create_transaction_result');
    }
}
