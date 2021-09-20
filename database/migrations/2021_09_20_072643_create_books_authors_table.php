<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_authors', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('author_id');
			$table->unsignedBigInteger('book_id');

            $table->foreign('author_id')
				->references('author_id')
				->on('authors')
				->onUpdate('cascade')
				->onDelete('cascade');

            $table->foreign('book_id')
				->references('book_id')
				->on('books')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->index(['author_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_authors');
    }
}
