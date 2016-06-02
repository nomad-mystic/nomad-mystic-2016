/**
 * Created by endof on 4/14/2016.
 */
$(function() {
    var city_search_submit = $('.city_search_submit');
    // This is where the magic happens
    // API call, user input validate and string manipulation
    city_search_submit.on('click', function() {
        var city_input = $('#city_input').val();
        var state_input = $('#state_input').val();
        var computed_city_input = city_input.split(' ').join('_');

        $.get('http://api.wunderground.com/api/3094ad0f0d065740/conditions/q/' + state_input + '/' + computed_city_input + '.json', function(data) {
            // DOM pieces
            var humidity = $('.humidity');
            var wind_speed = $('.wind_speed');
            var precip_today_string =  $('.precip_today_string');
            var dewpoint = $('.dewpoint');
            var visibility = $('.visibility');
            var last_update = $('.last_update');
            var feelslike_c = $('.feelslike_c');

            //Left column
            var city_info = $('.city_info');
            var weather = $('.weather');
            var degrees_f = $('.degrees');
            var weather_icon = $('.weather_icon');

            // error messages
            var error_message = "I didn't understand that...Please try again...";
            var error_div = $('.error');

            if(data.response.results) {
                error_div.text(error_message);
            } else {
                error_div.text('');
                console.log(data);
                
                // left column
                city_info.text(data.current_observation.observation_location.city);
                weather.text(data.current_observation.weather);
                degrees_f.html(data.current_observation.temp_f + "&deg;");
                weather_icon.attr('src', 'images/clientView/' + data.current_observation.icon + '.png');

                // Right column
                humidity.text('Humidity: ' + data.current_observation.relative_humidity);
                wind_speed.text('Wind Speed: ' + data.current_observation.wind_mph + ' mph');
                precip_today_string.text('Precipitation Today: ' + data.current_observation.precip_today_string);
                feelslike_c.html('Feels Like this in Celsius: ' + data.current_observation.feelslike_c + "&deg;");
                dewpoint.html('Dewpoint: ' + data.current_observation.dewpoint_f + ' &deg; F');
                visibility.text('Visibility: ' + data.current_observation.visibility_mi + ' Miles');
                last_update.text('Last Updated: ' + data.current_observation.observation_time);
            }
        }); // end GET
    }); // end city_search_submit
}); // end jQuery