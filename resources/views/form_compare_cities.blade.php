@extends('template_main')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Buscar cidades para comparar
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <div class="input-group mb-3">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <select class="js-example-basic-multiple" id="cities" name="cities[]" multiple="multiple"  style="width: 100%">
                            </select>
                        </div>
                    </div>
                        <div class="col-2">
                        <button type="button" class="btn btn-success btn-block" onclick="compareCities()">Comparar cidades</button>
                    </div>
                </div><!-- end row -->
            </div>
        </div>
    </div>
</div> 

<div id="divcomparecities" style="display: none;">
    <div class="row">
        <div class="col-6 d-flex justify-content-center">
            <div class="card" style="width: 600px; margin-top: 60px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h5 class="card-title" id="city1"></h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="state1"></h6>
                        </div>
                        <div class="col-2">
                            <img class="weather_icon" id="weather_icon1">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-10">
                            <span>Temperatura</span>
                        </div>
                        <div class="col-2">
                            <span class="temperature" id="temperature1"></span>
                        </div>
                    </div>     

                    <div class="row">
                        <div class="col-10">
                            <span>Velocidade do vento</span>
                        </div>
                            <div class="col-2">
                            <span class="wind_speed" id="wind_speed1"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <span>Chance de chuva</span>
                        </div>
                        <div class="col-2">
                            <span class="precip" id="precip1"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <span>Umidade</span>
                        </div>
                        <div class="col-2">
                            <span class="humidity" id="humidity1"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center">
            <div class="card" style="width: 600px; margin-top: 60px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h5 class="card-title" id="city2"></h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="state2"></h6>
                        </div>
                        <div class="col-2">
                            <img class="weather_icon" id="weather_icon2">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-10">
                            <span>Temperatura</span>
                        </div>
                        <div class="col-2">
                            <span class="temperature" id="temperature2"></span>
                        </div>
                    </div>     

                    <div class="row">
                        <div class="col-10">
                            <span>Velocidade do vento</span>
                        </div>
                            <div class="col-2">
                            <span class="wind_speed" id="wind_speed2"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <span>Chance de chuva</span>
                        </div>
                        <div class="col-2">
                            <span class="precip" id="precip2"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10">
                            <span>Umidade</span>
                        </div>
                        <div class="col-2">
                            <span class="humidity" id="humidity2"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/requestsLaravel.js')}}"></script>

@stop