'use strict';

var url = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=e97bd757a9b4c619b67d39814366db46';

const request = async url => {
    const response = await fetch(url);
    return response.ok ? response.json() : Promise.reject({error: 500});
};

const getWeatherInfo = async () => {
    try {
        const response = await request(url);
        document.querySelector('#divResponse').innerText = JSON.stringify(response);
    }
    catch(err) {
        console.log(err);
    }
};

document.addEventListener('DOMContentLoaded', () => {
        getWeatherInfo();
});

//this code was taken from https://gabrieleromanato.name/javascript-how-to-use-the-open-weather-map-api and simplified