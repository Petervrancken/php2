var url = 'endpoint_post_formdata.php';

var data = 'naam=Hanne&leeftijd=18';

fetch(url, {
    method: 'post',
    // Client stuurt data door zoals een formulier verzonden zou worden door de browser:
    headers: {'Content-Type':'application/x-www-form-urlencoded'},
    body: data
})
.then(res => res.json())
.then(function(res) {
    document.querySelector('#divResponse').innerText = JSON.stringify(res);
});
