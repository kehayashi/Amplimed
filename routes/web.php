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
    return view('template_main');
});

Route::get('/comparecities', function () {
    return view('form_compare_cities');
});

Route::get('/getCity', function () {
    return view('form_city_weather');
});

//rota para salvar uma cidade e sua previsao
Route::post('/cities/savecityweather', [\App\Http\Controllers\CityWeatherController::class, 'saveCityWeather']);

//rota para buscar os nomes de todas cidades
Route::get('/cities/getcities', [\App\Http\Controllers\CityWeatherController::class, 'getCities']);

//rota para buscar as cidades selecionadas para comparacao e suas previsoes
Route::post('/cities/getcitiesweather', [\App\Http\Controllers\CityWeatherController::class, 'getCitiesWeather']);


