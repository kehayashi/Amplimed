<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityWeather extends Model
{
    use HasFactory;

    protected $table = 'cityweather';

	protected $primaryKey = 'cityweather_id';

	public $timestamps = false;

    protected $fillable = [
        'city',
        'state',
        'temperature',
        'wind_speed',
        'precip',
        'humidity',
        'img',
    ];
}