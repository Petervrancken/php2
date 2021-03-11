<?php
function PrintHead()
{
    $head = file_get_contents("templates/head.html");
    print $head;
}

function PrintJumbo( $title = "", $subtitle = "" )
{
    $jumbo = file_get_contents("templates/jumbo.html");

    $jumbo = str_replace( "@jumbo_title@", $title, $jumbo );
    $jumbo = str_replace( "@jumbo_subtitle@", $subtitle, $jumbo );

    print $jumbo;
}

function PrintNavbar( )
{
    $navbar = file_get_contents("templates/navbar.html");

    //var_dump($_SESSION['user']); die();

    if ( isset($_SESSION['user']) )
    {
        $username = $_SESSION['user']->getVoornaam() . " " . $_SESSION['user']->getNaam();
    }
    else
    {
        $username = "Niet ingelogd";
    }

    $navbar = str_replace("@username@", $username, $navbar );

    print $navbar;
}

function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $url = 'api.openweathermap.org/data/2.5/weather?q='. $row['img_weather_location'] .'&lang=nl&units=metric&appid=b52796bc30156e560a722c868e798a2e';

            $restClient = new RESTClient($authentication = null);

            $restClient->CurlInit($url);
            $response = $restClient->CurlExec();
            $response= json_decode($response);

            //var_dump($response);

            $weather= $response->weather[0]->description;
            $temperature =$response->main->temp;
            $humidity = $response->main->humidity;

            $output= str_replace("@weather@", $weather, $output);
            $output= str_replace("@temperature@", $temperature, $output);
            $output= str_replace("@humidity@", $humidity, $output);
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    if ( $data == [] )
    {
        $returnvalue = $template;
    }

    return $returnvalue;
}

function MergeViewWithExtraElements( $template, $elements )
{
    foreach ( $elements as $key => $element )
    {
        $template = str_replace( "@$key@", $element, $template );
    }
    return $template;
}

function MergeViewWithErrors( $template, $errors )
{
    if ( $errors )
    {
        foreach ( $errors as $key => $error )
        {
            $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
        }
    }

    return $template;
}

function RemoveEmptyErrorTags( $template, $data )
{
    foreach ( $data as $row )
    {
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }

    return $template;
}