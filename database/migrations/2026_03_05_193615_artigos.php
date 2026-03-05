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
         
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('conteudo');
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('matricula')->nullable();
            $table->boolean('active')->default(true);
            $table->enum('status', ['rascunho', 'aguardando', 'publicado'])->default('rascunho');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artigos');
    }
};
