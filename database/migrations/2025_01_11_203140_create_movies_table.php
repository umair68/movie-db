<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('tmdb_id')->nullable()->unique()->index();
            $table->string('imdb_id', 20)->nullable()->unique()->index();
            $table->string('slug')->unique();
            $table->text('overview')->nullable();
            $table->date('release_date')->nullable()->index();
            $table->string('year');
            $table->string('poster_path')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->string('trailer_url')->nullable();
            $table->integer('runtime')->nullable();
            $table->string('original_language', 5);
            $table->boolean('is_adult');
            $table->bigInteger('budget')->nullable();
            $table->bigInteger('revenue')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
