
var url = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=e97bd757a9b4c619b67d39814366db46';

fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        document.querySelector('#divResponse').innerText = JSON.stringify(myJson);
    });