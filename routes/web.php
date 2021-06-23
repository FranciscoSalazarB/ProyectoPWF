<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('/');


Route::post('validar', [UserController::class,'validar'])->name('validar');
Route::post('nuevo_usuario', [UserController::class,'crear'])->name('nuevo_usuario');
Route::get('registro', function(){return view('registro');})->name('registro')->middleware('guest');
Route::get('salir', [UserController::class,'logout'])->name('salir')->middleware('auth');

Route::get('categorias', [CategoryesController::class, 'index'])->name('categorias');
Route::get('categorias/crear', [CategoryesController::class, 'store'])->name('categorias/crear')->middleware('auth');
Route::post('categorias/crear', [CategoryesController::class, 'create'])->name('categorias/crear')->middleware('auth');
Route::get('categorias/eliminar/{id}',[CategoryesController::class, 'destroy'])->name('categorias/eliminar')->middleware('auth');
Route::get('categorias/editar/{id}', [CategoryesController::class, 'edit'])->name('categorias/editar')->middleware('auth');
Route::post('categorias/editar/{id}', [CategoryesController::class, 'update'])->name('categorias/editar')->middleware('auth');
Route::post('buscar',[ProductController::class,'buscar'])->name('buscar');

Route::get('mis_productos', function(){
	return view('mis_productos');
})->name('mis_productos')->middleware('auth');

Route::get('producto/{id}',[ProductController::class,'show'])->name('producto');
Route::post('preguntar/{id}',[ProductController::class,'crearPregunta'])->name('preguntar');
Route::post('responder/{id}',[ProductController::class,'responder'])->name('responder');
Route::get('producto/{id}/editar',[ProductController::class,'edit'])->name('producto/editar');
Route::post('producto/{id}/editar',[ProductController::class,'update'])->name('producto/editar');
Route::get('producto/{id}/eliminar',[ProductController::class,'destroy'])->name('producto/eliminar');
Route::get('producto/{id}/consignar',[ProductController::class,'consignar'])->name('producto/consignar');
Route::get('producto/{id}/desconsignar',[ProductController::class,'desconsignar'])->name('producto/desconsignar');
Route::get('producto/{id}/comprar',[ProductController::class,'comprar'])->name('producto/comprar');
Route::post('producto/{id}/rechazar',[ProductController::class,'rechazar'])->name('producto/rechazar');

Route::get('trasaction/{id}',[TransactionController::class,'index'])->name('transaction');


Route::get('categorias/productos/{id}/crear', [ProductController::class,'store'])->name('categorias/productos/crear')->middleware('auth');
Route::post('categorias/productos/{id}/crear',[ProductController::class,'create'])->name('categorias/productos/crear')->middleware('auth');
Route::get('categorias/productos/{id}', [ProductController::class,'index'])->name('categorias/productos');


Route::get('dashboard',[AdminController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('dashboard/editar_usuario/{id}',[AdminController::class,'store'])->name('dashboard/editar_usuario');
Route::get('dashboard/ver_user/{id}',[AdminController::class,'ver_usuario'])->name('dashboard/ver_user');
Route::post('dashboard/editar_usuario/{id}',[UserController::class,'editar_usuario'])->name('dashboard/editar_usuario');
Route::get('cardex/{id}',[AdminController::class,'ver_cardex'])->name('cardex');

Route::get('no_consignados',[AdminController::class,'sinConsignar'])->name('no_consignados');
