<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->bigInteger('donation_id')->unsigned();
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_channel')->nullable();

            $table->enum('payment_status', [
                'pending',
                'success',
                'failed'
            ])->default('pending');

            $table->foreign('donation_id')->references('donation_id')->on('donations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
