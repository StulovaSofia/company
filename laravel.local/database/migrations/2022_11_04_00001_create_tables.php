<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("title", 500);
            $table->string("description");
        });

        Schema::create('tarrifs', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("title", 500);
            $table->float("cost");
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("title", 500);
            $table->string("description");
        });

        Schema::create('producers', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("firstname", 100);
            $table->string("lastname", 100);
            $table->integer("age");
        });

        Schema::create('films', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger("id_producer");
            $table->string("title", 1000);
            $table->string("description", 1000);
            $table->integer("year");
            $table->integer("duration");
            $table->string("country", 100);
            $table->foreign('id_producer')->references('id')->on('producers')->onDelete('cascade');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("name", 100);
            $table->string("login", 45);
            $table->string("password", 45);
            $table->unsignedBigInteger("id_level");
            $table->unsignedBigInteger("id_tarrif");

            $table->foreign('id_level')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('id_tarrif')->references('id')->on('tarrifs')->onDelete('cascade');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger("id_user");
            $table->unsignedBigInteger("id_tarrif");

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tarrif')->references('id')->on('tarrifs')->onDelete('cascade');
        });

        Schema::create('films_tarrifs', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger("id_film");
            $table->unsignedBigInteger("id_tarrif");

            $table->foreign('id_film')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('id_tarrif')->references('id')->on('tarrifs')->onDelete('cascade');
        });

        Schema::create('films_genres', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger("id_films");
            $table->unsignedBigInteger("id_genres");

            $table->foreign('id_films')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('id_genres')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('users');
        Schema::dropIfExists('tarrifs');
        Schema::dropIfExists('films_tarrifs');
        Schema::dropIfExists('films');
        Schema::dropIfExists('films_genres');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('producers');
    }
};
