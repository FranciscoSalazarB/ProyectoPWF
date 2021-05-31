<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function validar(Request $re)
    {
    	$re->validate([
    		'email'=>'required',
    		'pass'=>'required'
    	]);
    	$credenciales = $re->only('email','pass');
    	if (Auth::attempt([
    		'password'=>$re->input('pass'),
    		'email'=>$re->input('email')
    	])) {
    		$re->session()->regenerate();
    		return redirect('categorias');
    	}
    	return redirect('/');
    }

    public function logout(Request $re)
    {
        Auth::logout();
        $re->session()->invalidate();
        $re->session()->regenerateToken();
        return redirect('/');
    }

    public function crear(Request $re)
    {
    	if ($re->input('pass') !== $re->input('pass_repeat')) {
    		session(['error'=>'Contraseña no recordada']);
    		return redirect('registro');
    	}
    	$re->validate([
    		'user'=>'required',
    		'email'=>'required|email|unique:users',
    		'pass'=>'required'
    	]);
    	User::create([
    		'name'=>$re->input('user'),
    		'email'=>$re->input('email'),
    		'password'=>Hash::make($re->input('pass')),
    		'cargo'=>'Cliente'
    	]);
        Auth::attempt([
        'email'=>$re->input('email'),
        'password'=>$re->input('pass')
        ]);
    	return redirect('categorias');
    }

    public function editar_usuario($id, Request $re)
    {
        $usuario = User::where('id',$id)->first();
        $usuario->name = $re->input('name');
        $usuario->email = $re->input('email');
        $usuario->cargo = $re->input('grup1');
        if (!is_null($re->input('pass'))) {
            $usuario->password = Hash::make($re->input('pass'));
        }
        $usuario->save();
        return redirect('dashboard');
    }
}
