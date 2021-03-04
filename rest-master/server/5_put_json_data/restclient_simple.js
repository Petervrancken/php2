var url = 'endpoint_put_json.php';

var data = {naam: "Kate", leeftijd: 32};
var data_string = JSON.stringify(data);

//alert(data_string);

//PUT json data
fetch(url, {
    method: 'put',
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