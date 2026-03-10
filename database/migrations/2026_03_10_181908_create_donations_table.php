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
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('donation_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('campaign_id')->unsigned();
            $table->decimal('amount', total: 15, places: 0);
            $table->text('message')->nullable();
            $table->tinyInteger('is_anonymous');
            $table->enum('status', ['pending', 'paid', 'failed']);
            $table->string('payment_reference')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('campaign_id')->references('campaign_id')->on('campaigns')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
