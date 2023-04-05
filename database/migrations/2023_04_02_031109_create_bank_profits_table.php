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
        Schema::create('bank_profits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('income_id');
            $table->foreignId('gold_id');
            $table->float('pay_total', 15, 3)->nullable();
            $table->integer('pay_status')->nullable();
            $table->text('information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_profits');
    }
};
