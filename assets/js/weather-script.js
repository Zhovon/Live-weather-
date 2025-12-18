jQuery(window).on('elementor/frontend/init', function () {
    
    elementorFrontend.hooks.addAction('frontend/element_ready/elw_live_weather.default', function ($scope, $) {
        
        const widget = $scope.find('.elw-weather-card');
        const city = widget.data('city');
        const apiKey = widget.data('key');
        
        const loader = widget.find('.elw-loader');
        const content = widget.find('.elw-content');
        const errorMsg = widget.find('.elw-error');

        if (!apiKey) {
            loader.hide();
            errorMsg.text('Missing API Key').show();
            return;
        }

        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`)
            .then(response => {
                if (!response.ok) throw new Error(response.statusText);
                return response.json();
            })
            .then(data => {
                widget.find('.elw-city-name').text(data.name + ', ' + data.sys.country);
                widget.find('.elw-temp').html(Math.round(data.main.temp) + '&deg;C');
                widget.find('.elw-desc').text(data.weather[0].description);
                
                // USE 4x FOR HIGH QUALITY
                const iconCode = data.weather[0].icon;
                widget.find('.elw-icon').attr('src', `https://openweathermap.org/img/wn/${iconCode}@4x.png`);

                loader.hide();
                content.fadeIn();
            })
            .catch(error => {
                loader.hide();
                errorMsg.text('Weather not found').show();
            });
    });
});
