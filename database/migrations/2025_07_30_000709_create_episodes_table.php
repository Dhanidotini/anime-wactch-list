<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->integer('episode');
            $table->string('title');
            $table->string('native_title')->nullable();
            $table->string('translate_native_title')->nullable();
            $table->integer('length')->nullable();
            $table->string('id_video')->nullable();
            $table->boolean('airing')->default(false);
            $table->timestamp('release_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('anime_id')
                ->nullable()
                ->constrained('animes');
            $table->index(['episode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
