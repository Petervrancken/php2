<?php

//hardcoded array
$array = [ "Jan" => 23, "Piet" => 12, "Gella" => 24 ];

//natuurlijk kan je ook data uit de databank halen

//response in JSON formaat
print json_encode($array);
