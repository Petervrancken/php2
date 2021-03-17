<?php
$public_access = true;
require_once '../lib/autoload.php';
//Allow access from outside (see CORS)
//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: 'https://gf.dev'");
header("Access-Control-Allow-Credentials 'true'");


//Allow GET, POST, PUT, DELETE, OPTIONS http methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

//Allow some types of headers
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

//Set response content type and character set
header("Content-Type: application/json; charset=UTF-8");

//Basic Authentication controle
if ( $_SERVER['PHP_AUTH_USER'] !== "user123" OR $_SERVER['PHP_AUTH_PW'] !== "123456789" )
{
    //als er geen juiste credentials doorgegeven worden, afbreken met code 401 Unauthorized
    header('WWW-Authenticate: Basic realm="Provide your username and password for the Voorbeeld API"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request_uri);
var_dump(count($parts));

//zoek "rest" in de uri
for ( $i=0; $i<count($parts) ;$i++)
{
    if ( $parts[$i] == "rest" )
    {
        break;
    }
}
var_dump($parts[$i]);
$request_part = $parts[$i + 5];
if (count($parts) > $i + 1) {
    $id = $parts[$i + 2];
}
var_dump($request_part);

//$request_part = $parts[$i+5];
//if ( count($parts) > $i + 5 ) $id = $parts[$i + 5];

//Meerdere codes
if ( $method == "GET" AND $request_part == "btwcodes" )
{
    $sql = "select * from eu_btw_codes";
    // ... execute $sql
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier alle spelers teruggeven
}

// 1 code opvragen
if ( $method == "GET" AND $request_part == "btwcode" )
{
    $sql = "select * from eu_btw_codes where eub_id=$id";
    // ... execute $sql
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier ��n speler teruggeven
}

// nieuwe code toevoegen
if ( $method == "POST" AND $request_part == "btwcodes"  )
{
    $code = $_POST["code"];
    $sql = "INSERT INTO eu_btw_codes SET eub_code='$code' ";
    // ... execute $sql
    http_response_code(201);
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier een OK teruggeven
}

//code updaten
if ( $method == "PUT" AND $request_part == "btwcode" )
{
    $contents = json_decode( file_get_contents("php://input") );
    $newdata = $contents->naam;

    $sql = "UPDATE eub_btw_codes SET eub_code, eub_land='$newdata' WHERE spe_id=$id";
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

