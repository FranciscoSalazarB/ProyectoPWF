<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin',['usuarios'=>$users,'productos'=>$products]);
    }

    public function store($id)
    {
        $user = User::find($id);
        return view('editar_usuario',['user'=>$user]);
    }

    public function ver_usuario($id)
    {
        $user = User::find($id);
        return view('view_user',['user'=>$user]);
    }
    public function ver_cardex($id)
    {
        $producto = Product::find($id);
        return view('cardex',['producto'=>$producto]);
    }
    public function sinConsignar()
    {
        $productos = Product::where('consignado',0)->get();
        return view('resultado',['productos'=>$productos]);
    }
}
