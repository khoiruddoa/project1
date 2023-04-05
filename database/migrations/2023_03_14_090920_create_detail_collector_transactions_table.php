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
        Schema::create('detail_collector_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('collector_transaction_id');
            $table->foreignId('category_id'); 
            $table->integer('price');
            $table->float('qty', 10, 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_collector_transactions');
    }
};
