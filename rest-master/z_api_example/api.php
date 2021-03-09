<?php

// poort staat op 1252!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request_uri);
$request_part = $parts[3];

if ( count($parts) > 4 ) $id = $parts[4];

//GET spelers: alle spelers geven
if ( $method == "GET" AND $request_part == "spelers" )
{
    $sql = "select * from spelers";
    // ... execute $sql
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier alle spelers teruggeven
}

//GET speler: één speler geven
if ( $method == "GET" AND $request_part == "speler" )
{
    $sql = "select * from spelers where spe_id=$id";
    // ... execute $sql
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier één speler teruggeven
}

//POST spelers: een speler toevoegen
if ( $method == "POST" AND $request_part == "spelers"  )
{
    $naam = $_POST["naam"];
    $sql = "INSERT INTO spelers SET spe_naam='$naam' ";
    // ... execute $sql
    http_response_code(201);
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier een OK teruggeven
}

//PUT speler: een speler updaten
if ( $method == "PUT" AND $request_part == "speler" )
{
    $contents = json_decode( file_get_contents("php://input") );
    $newdata = $contents->naam;

    $sql = "UPDATE spelers SET spe_naam='$newdata' WHERE spe_id=$id";
    // ... execute $sql
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier een OK teruggeven
}

//DELETE speler: een speler verwijderen
if ( $method == "DELETE" AND $request_part == "speler" )
{
    $sql = "DELETE FROM spelers WHERE spe_id=$id";
    // ... execute $sql
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier een OK teruggeven
}

?>

