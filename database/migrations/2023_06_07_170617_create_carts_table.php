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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id');
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade');
<<<<<<< HEAD
            $table->boolean('approved');
=======
            $table->boolean('approved')->default(false)->change();

>>>>>>> project1/main
            $table->float('final_price');
            $table->boolean('payed');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
=======
    
>>>>>>> project1/main
        Schema::dropIfExists('carts');
    }
};
