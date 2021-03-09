<?php
//hardcoded array
$array = [ "Jan" => 23, "Piet" => 12, "Gella" => 24 ];

//opgegeven record toevoegen aan array
$contents = json_decode( file_get_contents("php://input") );
$naam = $contents->naam;
$leeftijd = $contents->leeftijd;
$array[ $naam ] = $leeftijd;

//natuurlijk kan je ook data in de databank updaten/...

//response in JSON formaat
print json_encode($array);
