var url = 'endpoint_post_json.php';

var data = {naam: "Billie", leeftijd: 14};
var data_string = JSON.stringify(data);

//alert(data_string);

//POST json data
fetch(url, {
    method: 'post',
    headers: {
        // Client verwacht response terug in JSON formaat:
        'Accept': 'application/json',
        // Client stuurt data door in JSON formaat:
        'Content-Type': 'application/json'
    },
    body: data_string
})
.then(res => res.json())
.then(function(res) {
    document.querySelector('#divResponse').innerText = JSON.stringify(res);
});