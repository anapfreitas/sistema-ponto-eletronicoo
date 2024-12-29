<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros_ponto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id')->constrained()->onDelete('cascade');
            $table->date('data');
            $table->time('horario_entrada')->nullable(); 
            $table->time('horario_saida')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_ponto');
    }
};
