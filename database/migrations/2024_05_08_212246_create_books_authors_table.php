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
        Schema::create('books_authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('book_id');
            $table->unsignedBiginteger('author_id');
            $table->foreign('book_id')->references('id')
                 ->on('books');
            $table->foreign('author_id')->references('id')
                ->on('authors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_authors');
    }
};
