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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // no max 100 digitos
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // no max 8 digitos, 2 digitos apos a virgula
            $table->string('thumbnail')->nullable();
            //$table->integer('stock')->default(0);
            $table->timestamps(); // datetime da criacao
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
