<?php

use App\Models\Post;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('urlLink');
            $table->text('resumen');
            $table->longText('body');
            $table->enum('estado', [Post::DRAFT,Post::PUBLISHED])->default(Post::DRAFT);

//            $table->unsignedBigInteger('categoria_id');
//            $table->foreign('categoria_id')->references('id')->on('categories');

            $table->foreignId('categoria_id')->constrained('categories')->onDelete('cascade');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
