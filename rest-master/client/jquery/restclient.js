$(window).on('load', function(){

    var url = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=e97bd757a9b4c619b67d39814366db46';

    //to test failure: comment line above and uncomment line below
    //var url = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=thisisnottherightapikey';

    $.ajax({
        method: "GET",
        url: url
    })
    //on success ...
    .done( function( data ) {

            console.log(data);
            $('#divResponse').html(JSON.stringify(data));

    })
    //on failure ...
    .fail( function( xhr, ajaxOptions, thrownError ) {

            var msg = "Error when POSTING to " + url + "<br><br><b>" + xhr.status + ": " + xhr.responseText + ": " + thrownError + '</b><br>' ;

            console.log(msg);
            $('#response').html(msg);
    });

});

