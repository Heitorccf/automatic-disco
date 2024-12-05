<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redireciona a rota raiz para login
Route::get('/', function () {
   return redirect('/login');
});

// Rotas de autenticação (apenas login e registro)
Auth::routes([
   'reset' => false,
   'verify' => false
]);

// Rota para a página home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rotas do CRUD de produtos (protegidas por autenticação)
Route::resource('products', ProductController::class)->middleware('auth');