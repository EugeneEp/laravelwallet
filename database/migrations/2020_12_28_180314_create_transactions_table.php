<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('wallet_sender_id')->nullable();
            $table->integer('wallet_reciever_id')->nullable();
            $table->integer('user_id');
            $table->string('movement_type');
            $table->string('amount');
            $table->string('commission');
            $table->integer('time');
            $table->integer('secret_t')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->string('card')->nullable();
            $table->string('email')->nullable();
            $table->integer('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
