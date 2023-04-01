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
        Schema::create('manages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('income_id');
            $table->foreignId('user_id');
            $table->float('profit',10,3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manages');
    }
};
