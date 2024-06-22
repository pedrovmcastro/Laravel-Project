<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'thumbnail',
    ];
}

// O atributo $fillable em uma model do Laravel serve para definir os campos que podem ser “atribuídos em massa” (mass assignment). 
// Isso significa que você pode passar vários valores de uma vez só para inserção no banco de dados. Por exemplo, suponha que você tenha um model User com os campos id, nome e idade.
// Sem o $fillable, você precisaria criar um objeto e atribuir os valores um por um, como no exemplo abaixo:

// $joao = new User();
// $joao->nome = 'João';
// $joao->idade = 20;
// $joao->save();

//No entanto, para facilitar esse cadastro, você pode definir o valor de $fillable com as colunas que deseja permitir. Por exemplo:

// protected $fillable = ['nome', 'idade'];

// Agora você pode criar um novo usuário assim:

//$joao = User::create([
//    'nome' => 'João',
//    'idade' => 20
// ]);
