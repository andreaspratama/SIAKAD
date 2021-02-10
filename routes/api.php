<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/siswa/{id}/tambahnilai', 'ApiController@tambahnilai');
Route::post('login', 'API\AuthController@login');
Route::get('siswa', 'API\SiswaController@index');
Route::get('siswa/{id}', 'API\SiswaController@show');
Route::get('guru', 'API\GuruController@index');
Route::get('guru/{id}', 'API\GuruController@show');
Route::get('jadwal', 'API\JadwalController@index');
Route::post('onlinepem', 'API\OnlinepemController@proses');
