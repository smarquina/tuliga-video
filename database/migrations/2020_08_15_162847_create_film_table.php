<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('description', 255)->nullable();
            $table->foreignId('film_genre_id')->nullable()->constrained('film_genre')->onDelete('cascade');
            $table->foreignId('film_type_id')->nullable()->constrained('film_type')->onDelete('cascade');
            $table->string('image', 255)->nullable();
            //$table->string('image_thumbnail', 255)->nullable();
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
        Schema::dropIfExists('film');
    }
}
