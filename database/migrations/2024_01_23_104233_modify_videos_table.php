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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('thumbnail_url');
            $table->string('demo_url')->nullable();
            $table->string('source_url');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('duration');
            $table->timestamps();

            $table->unsignedBigInteger('headline_id');
            $table->foreign('headline_id')->references('id')->on('headlines')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropForeign(['headline_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('videos');
    }
};