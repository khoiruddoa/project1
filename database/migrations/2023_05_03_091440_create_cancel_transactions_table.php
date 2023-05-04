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
        Schema::create('cancel_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('transaction_id');
            $table->foreignId('category_id'); 
            $table->integer('price');
            $table->integer('sell');
            $table->float('qty', 10, 3);
            $table->text('information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancel_transactions');
    }
};
