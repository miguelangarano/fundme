<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/proyectos', function () {
    return view('projects');
});

Route::get('/registro', function () {
    return view('register');
});

Route::get('/ingreso', function () {
    return view('login');
});

Route::get('/crear', function () {
    return view('create');
});

Route::get('/formulario-tarjeta', function () {
    return view('cardform');
});
