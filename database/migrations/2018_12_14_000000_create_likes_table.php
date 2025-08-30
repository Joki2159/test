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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->comment('ID korisnika koji lajkuje');
            $table->unsignedBigInteger('likeable_id')->comment('ID entiteta koji je lajkovan');
            $table->string('likeable_type')->comment('Tip entiteta (modela)');
            $table->timestamps();

            $table->unique(['user_id', 'likeable_id', 'likeable_type'], 'user_like_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
