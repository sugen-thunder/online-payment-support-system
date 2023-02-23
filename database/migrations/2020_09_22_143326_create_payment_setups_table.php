<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_setups', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('user_id')->unsigned();
            $table->uuid('uuid')->unique();
            $table->boolean('is_active');
            $table->boolean('is_advance');
            $table->text('remarks')->nullable();
            $table->json('contents')->nullable();
            $table->float('total', 15, 2)->unsigned();
            $table->string('currency', 8);
            $table->json('payment_options')->nullable();
            $table->integer('recurring_type')->nullable();
            $table->date('reference_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->integer('no_of_payments')->nullable();
            $table->integer('extended_days')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('recurring_payments');
    }
}
