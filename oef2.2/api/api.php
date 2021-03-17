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
//var_dump(count($parts));
//var_dump($parts);


//zoek "api" in de uri
for ( $i=0; $i<count($parts) ;$i++)
{
    if ( $parts[$i] == "api" )
    {
        break;
    }
}
//var_dump($parts[$i]);
$request_part = $parts[$i + 1];
if (count($parts) > $i + 1) {
    $id = $parts[$i + 2];
}
var_dump($id);
var_dump($request_part);
// globale test, werk bij zowel codes als code, anders geeft het een foutmelding
if($request_part !== "btwcodes" && $request_part !== "btwcode" ){
    print json_encode( [ "msg" => "Request ongeldig" ] ) ;
}

if ($id AND $request_part == "btwcodes") {
    print json_encode( [ "msg" => "Request ongeldig" ] ) ;
    exit;
}

//Meerdere codes
if ( $method == "GET" AND $request_part == "btwcodes" )
{
    $sql = "select * from eu_btw_codes";
    $data = $container->getDBManager()->GetData($sql, $fetch= 'assoc');
    // ... execute $sql
    print json_encode( [ "msg" => $data ] ) ;

}

// 1 code opvragen
if ( $method == "GET" AND $request_part == "btwcode" )
{
    if(is_numeric($id)){
        $sql = "select * from eu_btw_codes where eub_id=$id";
        $data = $container->getDBManager()->GetData($sql, $fetch= 'assoc');
        // ... execute $sql
        print json_encode( [ "msg" => $data ] ) ;
    }else{
        print json_encode( [ "msg" => "ID is not a number" ] ) ;
    }
}


// nieuwe code toevoegen
if ( $method == "POST" AND $request_part == "btwcodes"  )
{
    $code = $_POST["code"];
    $land = $_POST["land"];
    $sql = "INSERT INTO eu_btw_codes SET eub_code='$code', eub_land='$land' ";
    $data = $container->getDBManager()->ExecuteSQL($sql);
    // ... execute $sql
    http_response_code(201);
    print json_encode( [ "msg" => $data, "New country added"] );
    exit;
}



//code updaten
if ( $method == "PUT" AND $request_part == "btwcode" )
{
    if(is_numeric($id)){
        $contents = json_decode( file_get_contents("php://input") );
        $newland = $contents->land;
        $newcode = $contents->code;
        $sql = "UPDATE eu_btw_codes SET eub_code='$newcode', eub_land='$newland' where eub_id=$id ";
        $data = $container->getDBManager()->ExecuteSQL($sql);
        // ... execute $sql
        print json_encode( [ "msg" => $newland, $newcode, "New Country updated" ] ) ;
        exit;
    }else{
        print json_encode( [ "msg" => "ID is not a number" ] ) ;
    }
}

//DELETE a code
if ( $method == "DELETE" AND $request_part == "btwcode" )
{
    if(is_numeric($id)){
        $sql = "DELETE FROM eu_btw_codes WHERE eub_id=$id";
        $data = $container->getDBManager()->ExecuteSQL($sql);
        // ... execute $sql
        print json_encode( [ "msg" => $data, "Is deleted" ] ) ;
        exit;
    }else{
        print json_encode( [ "msg" => "ID is not a number" ] ) ;
    }
}

?>

