<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->comment('ID korisnika koji je dodao u favorite');
            $table->unsignedBigInteger('favoriteable_id')->comment('ID entiteta koji je označen kao favorit');
            $table->string('favoriteable_type')->comment('Tip entiteta (modela)');
            $table->timestamps();

            $table->unique(['user_id', 'favoriteable_id', 'favoriteable_type'], 'user_favorite_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};
