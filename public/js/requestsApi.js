/* Função para buscar o nome da cidade utilizando o codigo do CEP */
function getCity() {
    var cep = $('#cep').val();
    $("#city").empty();

    if(cep){
        $.ajax({
            url: 'https://viacep.com.br/ws/'+cep+'/json/',
            dataType: 'json',
            crossDomain: true,
            contentType: "application/json",
            success: function(json){
                $("#city").val(json.localidade);
                $("#btngetweather").prop('disabled', false);
            },
            error: function () {
                $("#city").val("Cidade não encontrada!");
                $("#card-weather").hide();
            }
        });
    }
}

/* Função para buscar a previsao do tempo de uma cidade utilizando o nome da cidade */
function getWeather() {
    var city = $('#city').val();

    if(city){
        $.ajax({
            url: "https://api.weatherstack.com/current?access_key=6335011b88cc6ae2e70a567a7d83dc83&query="+city,
            dataType: 'json',
            crossDomain: true,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            success: function(json){
                $("#card-weather").show();
                $(".card-title").text(json.location.name);
                $(".precip").text(json.current.precip+"%");
                $(".humidity").text(json.current.humidity+"%");
                $(".card-subtitle").text(json.location.region);
                $(".temperature").text(json.current.temperature+"°C");
                $(".wind_speed").text(json.current.wind_speed+" km/h");
                $(".weather_icon").attr("src", json.current.weather_icons);
            },
            error: function () {
                alert("Cidade não encontrada!");
                $("#card-weather").hide();
            }
        });
    }
}

/* Função para salvar a previsao do tempo de uma cidade */
function saveWeather() {
    var token       = $('#token').val();
    var precip      = $(".precip").text();
    var humidity    = $(".humidity").text();
    var city        = $(".card-title").text();
    var wind_speed  = $(".wind_speed").text();
    var temperature = $(".temperature").text();
    var state       = $(".card-subtitle").text();
    var img         = $(".weather_icon").attr("src");

    $.ajax({
        url: '/cities/savecityweather',
        method: "POST",
        dataType: 'json',
        data: {
            "img": img,
            "city": city,
            "state": state,
            "_token": token,
            "precip": precip,
            "humidity": humidity,
            "wind_speed": wind_speed,
            "temperature": temperature,
        },
        success: function(json){
           alert("Previsao salva com sucesso!");
        },
        error: function (json) {
            alert("Não foi possivel salvar!");
        }
    });
}