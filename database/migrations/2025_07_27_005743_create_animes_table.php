<?php

use App\Models\Animes\Type;
use App\Models\Animes\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('score')->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('synonyms')->nullable();
            $table->string('title_eng')->nullable();
            $table->string('title_jp')->nullable();
            $table->string('premiered')->nullable();
            $table->text('synopsis');
            $table->timestamp('airing_date_start')->nullable();
            $table->timestamp('airing_date_end')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('type_id')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->foreignId('source_id')->nullable();
            $table->foreignId('user_id')->nullable()
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
