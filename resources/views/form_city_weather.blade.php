@extends('template_main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Buscar cidade
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Informe o CEP:</span>
                                </div>
                                <input type="text" class="form-control" id="cep">
                            </div>
                        </div>
                            <div class="col-2">
                            <button type="button" class="btn btn-success btn-block" onclick="getCity()">Buscar Cidade</button>
                        </div>
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">Nome da cidade:</span>
                                </div>
                                <input type="text" class="form-control" id="city" readOnly>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-success btn-block" id="btngetweather" disabled onclick="getWeather()">Buscar Previsão</button>
                        </div>
                    </div><!-- end row -->

                </div>
            </div>
        </div>
    </div> 

    <div class="container" id="card-weather" style="display: none">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card" style="width: 600px; margin-top: 60px;">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="card-title"></h5>
                                <h6 class="card-subtitle mb-2 text-muted"></h6>
                            </div>
                            <div class="col-2">
                                <img class="weather_icon">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-10">
                                <span>Temperatura</span>
                            </div>
                            <div class="col-2">
                                <span class="temperature"></span>
                            </div>
                        </div>     

                        <div class="row">
                            <div class="col-10">
                                <span>Velocidade do vento</span>
                            </div>
                                <div class="col-2">
                                <span class="wind_speed"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10">
                                <span>Chance de chuva</span>
                            </div>
                            <div class="col-2">
                                <span class="precip"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10">
                                <span>Umidade</span>
                            </div>
                            <div class="col-2">
                                <span class="humidity"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="button" class="btn btn-success btn-block" onclick="saveWeather()">Salvar Previsão do tempo</button>
                            </div>
                            <div class="col-4"></div>
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

<script src="{{asset('js/requestsApi.js')}}"></script>

@stop