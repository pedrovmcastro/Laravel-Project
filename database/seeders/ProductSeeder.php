<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate(); // Limpa a tabela antes de inserir os dados.

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
                'thumbnail' => 'miniPizza.jpg',
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
            [
                'name' => 'Cone de Doce de Leite',
                'description' => 'conezinho',
                'price' => 4.75,
                'thumbnail' => 'cone.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
  	        [
                'name' => 'Monster',
                'description' => 'Energético',
                'price' => 11.00,
                'thumbnail' => 'monster.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
  	        [
                'name' => 'Torcida Bacon',
                'description' => 'Salgadinho sabor Bacon',
                'price' => 4.00,
                'thumbnail' => 'torcida.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
