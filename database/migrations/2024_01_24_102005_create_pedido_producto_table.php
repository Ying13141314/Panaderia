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
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('pedido_id')
                ->constrained('pedidos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('producto_id')
                ->constrained('productos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_producto');
    }
};
