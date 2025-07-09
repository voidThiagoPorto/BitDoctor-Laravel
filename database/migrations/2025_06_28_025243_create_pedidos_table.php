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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("userId")->constrained("users", "id")->onDelete('cascade');;
            $table->string("endereco", 256);
            $table->string("numero", 10);
            $table->string("cep", 10);
            $table->string("estado", 100);
            $table->string("description", 1024);
            $table->enum("status", ["Esperando entrega", "Recebido", "Em andamento", "Enviado", "Completo", "Cancelado"]);
            $table->string("imagem", 256);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
