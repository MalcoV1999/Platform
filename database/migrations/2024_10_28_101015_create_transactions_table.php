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
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount_used');
            $table->foreignId('point_id')->constrained('transactions', 'id')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('transactions', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }
        
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
