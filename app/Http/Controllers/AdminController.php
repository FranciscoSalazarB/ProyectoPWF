<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin',['usuarios'=>$users]);
    }

    public function store($id)
    {
        $user = User::find($id);
        return view('editar_usuario',['user'=>$user]);
    }

    public function edit($id, Request $req){
        return "jaló";
    }
}
