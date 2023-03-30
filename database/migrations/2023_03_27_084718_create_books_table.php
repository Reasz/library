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
        Schema::create('books', function (Blueprint $table) {
            //$table->bigIncrements('book_id');
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->integer('edition');
            $table->string('placement');
            $table->timestamp('edited_at');
            $table->bigInteger('isbn');
            $table->integer('number_of_copies');
            $table->integer('rented_copies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
