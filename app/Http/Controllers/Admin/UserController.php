<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::first();
        return view('admin.users.index', [
            'user' => $user
        ]);
    }
}
