<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityWeather;

class CityWeatherController extends Controller
{   
    /**
     * Método responsável por salvar/atualizar a previsao do tempo de uma cidade
     * @param object  $value->state, $value->city, $value->precip, $value->humidity, $value->wind_speed, $value->temperature, $value->img
     * @return true
     */ 
    public function saveCityWeather(Request $value)
    {   
       $city = CityWeather::where("city", "=", $value->city)
                            ->where("state", "=", $value->state)
                            ->first(); 
        
        if ($city) {
            $city->img         = $value->img;
            $city->precip      = $value->precip;
            $city->humidity    = $value->humidity;
            $city->wind_speed  = $value->wind_speed;
            $city->temperature = $value->temperature;
            $city->save();

            return true;
        }

       CityWeather::create($value->all());

       return true;
    }

    /**
     * Método responsável por buscar todas as cidades ja salvas no banco de dados
     * @return json
     */
    public function getCities() 
    {
        $cities = CityWeather::pluck('city');

        return json_encode($cities);
    }

    /**
     * Método responsável por buscar as cidades selecionadas para comparacao
     * @param object 
     * @return json
     */ 
    public function getCitiesWeather(Request $value) {
        
        $cities = [];
        foreach($value->cities as $v) {
           $cities[] = CityWeather::where("city", "=", $v)->first();
        }

        return json_encode($cities);
    }
}