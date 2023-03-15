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
        Schema::create('convertions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('administrator'); 
            $table->integer('pay_total')->nullable();
            $table->integer('pay_status');
            $table->text('information')->nullable();
            $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convertions');
    }
};