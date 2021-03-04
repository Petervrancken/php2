
var url = 'endpoint_text.php';

fetch(url)
    .then(function(response) {
        return response.text();
    })
    .then(function(text) {
        document.querySelector('#divResponse').innerText = text;
    });