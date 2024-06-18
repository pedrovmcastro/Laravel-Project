<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);  
        //ao invés de mostrar todos os dados de uma vez utilizando o comando User::all();
        //com o paginate é possível definir quantos usuários serão mostrados por página 
        
        return view('admin.users.index', compact('users'));
    }
}
