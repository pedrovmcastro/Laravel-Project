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

        DB::table('products')->insert([
            [
                'name' => 'Café',
                'description' => 'Café coado, 50ml',
                'price' => 2.00,
                'thumbnail' => 'cafe.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pão de queijo',
                'description' => '',
                'price' => 4.00,
                'thumbnail' => 'paoDeQueijo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salgado',
                'description' => 'Coxinha de frango, Risole de carne, Esfiha de Frango, Esfiha de Carne, Esfiha de Presunto e Queijo, Pão de Batata c/ Requeijão',
                'price' => 7.00,
                'thumbnail' => 'salgado.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sanduíche Natural',
                'description' => 'Frango, maionese, cenoura, milho, passas e pão integral',
                'price' => 10.00,
                'thumbnail' => 'sanduicheNatural.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Misto Quente',
                'description' => 'Queijo mussarela, presunto e pão de forma',
                'price' => 10.00,
                'thumbnail' => 'mistoQuente.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mini Pizza',
                'description' => 'Calabresa, Portuguesa, Quatro-Queijos e Frango com Catupiry',
                'price' => 10.00,
                'thubmnail' => 'miniPizza.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coca-Cola',
                'description' => 'Coquinha 200ml',
                'price' => 3.50,
                'thumbnail' => 'coquinha.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
