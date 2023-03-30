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
        Schema::create('favorites', function (Blueprint $table) {
            //$table->bigIncrements('favorite_id');
            //$table->unsignedBigInteger('book_id');
            //$table->unsignedBigInteger('user_id');
            $table->id();
            $table->foreignId('book_id');
            $table->foreignId('user_id');
            $table->timestamp('edited_at');
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            //$table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
