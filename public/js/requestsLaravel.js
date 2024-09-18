$(document).ready(function() {
    $('#cities').select2(); 
    $("#cities").select2({
        maximumSelectionLength: 2
    });

    /* Buscar cidade e adicionar opcoes no select dinamico */
    $.ajax({
        url: '/cities/getcities',
        dataType: 'json',
        crossDomain: true,
        contentType: "application/json",
        success: function(json){
            $.each(json, function(i, item) {
                var newOption = new Option(item, item, false, false);
                $('#cities').append(newOption);
            });
        },
        error: function () {
            alert("Não foi possivel buscar as cidades");
        }
    });
});

/* Função para buscar as previsoes das cidades selecionadas */
function compareCities() {
    var cities = $("#cities").select2('val');
    var token  = $('#token').val();

    if (cities) {
        $.ajax({
            url: '/cities/getcitiesweather',
            method: "POST",
            dataType: 'json',
            data: {
                "cities": cities,
                "_token": token,
            },
            success: function(json){
                $.each(json, function(i, item) {
                    i++;
                    $("#divcomparecities").show();
                    $("#state"+i).text(item.state);
                    $("#precip"+i).text(item.precip);
                    $("#humidity"+i).text(item.humidity);
                    $("#city"+i).text(item.city);
                    $("#temperature"+i).text(item.temperature);
                    $("#wind_speed"+i).text(item.wind_speed);
                    $("#weather_icon"+i).attr("src", item.img);
                });
            },
            error: function (json) {
                alert("Não foi possivel buscar as informaçoes!");
                $("#divcomparecities").hide();
            }
        });
    }
}