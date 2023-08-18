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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('table_id');
<<<<<<< HEAD
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('accepted');
=======
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('accepted');
            $table->boolean('admin_responsed');
            $table->boolean('ended');
>>>>>>> project1/main
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
