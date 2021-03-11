<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">


<?php
    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //export button
    $output ="";
    $output .= "<a style='margin-left: 10px' class='btn btn-info' role='button' href='export/export_images.php'>Export CSV</a>";
    $output .= "<div><br></div>";

    //get data
    $data = $container->getDBManager()->GetData( "select * from images" );

    //get template
    $template = file_get_contents("templates/column.html");

    $output .= MergeViewWithData( $template, $data );


    /*foreach ( $data as $row ) {

        //var_dump($row['img_weather_location']);
        $url = 'api.openweathermap.org/data/2.5/weather?q='. $row['img_weather_location'] .'&lang=nl&units=metric&appid=b52796bc30156e560a722c868e798a2e';

        $restClient = new RESTClient($authentication = null);

        $restClient->CurlInit($url);
        $response = $restClient->CurlExec();
        $response= json_decode($response);

        //var_dump($response);

        $weather= $response->weather[0]->description;
        $temperature =$response->main->temp;
        $humidity = $response->main->humidity;
        //merge


        print $weather;
        print " ";
        print $temperature;
        print " ";
        print $humidity;




    }
    $output= str_replace("@weather@", $weather, $output);
    $output= str_replace("@temperature@", $temperature, $output);
    $output= str_replace("@humidity@", $humidity, $output);*/

    print $output;





    /*foreach ( $data as $row )
    {
        $output = $template;
        //var_dump($row['img_weather_location']);
        $url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $row['img_weather_location'] . ',uk&APPID=e97bd757a9b4c619b67d39814366db46';

        $restClient = new RESTClient( $authentication = null );

        $restClient->CurlInit($url);
        $response = $restClient->CurlExec();

        //var_dump($row);

        /*if ($row == $row['img_weather_location']){
            $weather = "nieuwe tekst";
            foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
            {
                $output = str_replace( "@$field@", $weather, $output );
            }
        }else {
            foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
            {
                $output = str_replace( "@$field@", $row["$field"], $output );
            }

        }

    }*/
    //print $output;



?>

    </div>
</div>

</body>
</html>