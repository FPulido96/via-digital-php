$(document).ready(function() {
    // Cargar lista de países al cargar la página
    $.ajax({
        url: 'https://restcountries.com/v3.1/all',
        method: 'GET',
        data: {
            lang: 'es' // Especifica el idioma deseado (en este caso, español)
        },
        success: function(data) {
            $('#paises').empty();
            $('#paises').append($('<option>', {
                value: '',
                text: 'Selecciona un país'
            }));

            // Ordenar los países alfabéticamente por nombre
            var countries = data.sort(function(a, b) {
                return a.name.common.localeCompare(b.name.common);
            });

            // Agregar opciones al elemento <select>
            countries.forEach(function(country) {
                $('#paises').append($('<option>', {
                    value: country.name.common,
                    text: country.name.common
                }));
            });
        }
    });

    // Cuando se selecciona un país, cargar los estados correspondientes
    $('#paises').change(function() {
        var countryName = $(this).val();
        console.log("Pais: ", countryName);
        cargarEstados(countryName);
    });

    // Cuando se selecciona un estado, cargar las ciudades correspondientes
    $('#estados').change(function() {
        var countryName = $('#paises').val();
        var stateName = $(this).val();
        cargarCiudades(countryName, stateName);
    });
});

function cargarEstados(countryName) {
    $.ajax({
        url: 'https://restcountries.com/v3.1/name/' + countryName,
        method: 'GET',
        data: {
            lang: 'es' // Especifica el idioma deseado (en este caso, español)
        },
        success: function(data) {
            var states = data[0].subdivisions;
            $('#estados').empty();
            $('#estados').append($('<option>', {
                value: '',
                text: 'Selecciona un estado'
            }));

            // Verifica si hay subdivisiones (estados)
            if (states) {
                // Ordenar los estados alfabéticamente por nombre
                var sortedStates = Object.keys(states).sort(function(a, b) {
                    return states[a].name.localeCompare(states[b].name);
                });

                // Agregar opciones al elemento <select>
                sortedStates.forEach(function(stateKey) {
                    $('#estados').append($('<option>', {
                        value: stateKey,
                        text: states[stateKey].name
                    }));
                });
            }
        }
    });
}

function cargarCiudades(countryName, stateName) {
    $.ajax({
        url: 'https://restcountries.com/v3.1/name/' + countryName,
        method: 'GET',
        data: {
            lang: 'es' // Especifica el idioma deseado (en este caso, español)
        },
        success: function(data) {
            var states = data[0].subdivisions;
            var cities = states[stateName].cities;
            $('#ciudades').empty();
            $('#ciudades').append($('<option>', {
                value: '',
                text: 'Selecciona una ciudad'
            }));

            // Verifica si hay ciudades
            if (cities) {
                // Ordenar las ciudades alfabéticamente
                var sortedCities = cities.sort(function(a, b) {
                    return a.localeCompare(b);
                });

                // Agregar opciones al elemento <select>
                sortedCities.forEach(function(city) {
                    $('#ciudades').append($('<option>', {
                        value: city,
                        text: city
                    }));
                });
            }
        }
    });
}
