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
        Schema::create('collector_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('administrator'); 
            $table->float('pay_total', 10 , 3)->nullable();
            $table->integer('pay_status');
            $table->integer('information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collector_transactions');
    }
};
