<?php
//hardcoded array
$array = [ "Jan" => 23, "Piet" => 12, "Gella" => 24 ];

//opgegeven record toevoegen aan array
$naam = $_POST["naam"];
$leeftijd = $_POST["leeftijd"];

$array[ $naam ] = $leeftijd;

//natuurlijk kan je ook data in de databank toevoegen/updaten/...

//response in JSON formaat
print json_encode($array);
