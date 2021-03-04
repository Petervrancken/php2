var url = 'endpoint_delete_json.php';

var data = {naam: "Jan"};
var data_string = JSON.stringify(data);

//alert(data_string);

//PUT json data
fetch(url, {
    method: 'delete',
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