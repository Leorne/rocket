<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/registration', 'AuthController@registration');
Route::post('/token', 'AuthController@token');

Route::middleware("auth:sanctum")->get('/products', 'ProductController@index');
