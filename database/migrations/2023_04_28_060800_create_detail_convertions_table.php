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
        Schema::create('detail_convertions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('convertion_id'); 
            $table->integer('price');
            $table->integer('buy');
            $table->integer('profit');
            $table->float('gram', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_convertions');
    }
};
