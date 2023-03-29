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
        Schema::create('rented', function (Blueprint $table) {
            $table->bigIncrements('rented_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamp('edited_at');
            $table->integer('number_of_copies');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rented');
    }
};
