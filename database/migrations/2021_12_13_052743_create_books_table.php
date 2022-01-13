<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('isbn', 50);
            $table->text('author')->nullable();
            $table->text('note')->nullable();
            $table->text('image')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('edition', 100)->nullable();
            $table->string('publisher', 100)->nullable();
            $table->string('published', 100)->nullable();
            $table->unsignedBigInteger('book_category_id')->nullable();
            $table->foreign('book_category_id')->references('id')->on('book_cateories')->cascadeOnDelete();
            $table->unsignedBigInteger('rack_id')->nullable();
            $table->foreign('rack_id')->references('id')->on('racks')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
