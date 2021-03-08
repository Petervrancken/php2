<?php
//hardcoded array
$array = [ "Jan" => 23, "Piet" => 12, "Gella" => 24 ];

//opgegeven record verwijderen uit array
$contents = json_decode( file_get_contents("php://input") );
$naam = $contents->naam;
unset( $array[ $naam ] );

$fp = fopen("log.txt", "a+");
fwrite($fp, $naam . "\r\n");
fclose($fp);

//natuurlijk kan je ook data in de databank verwijderen ...

//response in JSON formaat
print json_encode(["msg" => "1 Record deleted"]);
