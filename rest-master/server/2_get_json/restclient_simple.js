
var url = 'endpoint_json.php';

fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        document.querySelector('#divResponse').innerText = JSON.stringify(myJson);
    });