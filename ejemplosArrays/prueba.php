<?php
$datos = [
    ["nombre" => "pepe", "edad" => 25, "peso" => 80],
    ["nombre" => "juan", "edad" => 22, "peso" => 75]
];

print "<p>{$datos[1]["nombre"]} pesa {$datos[1]["peso"]} kilos</p>\n";
print "\n";
print "<p>" . $datos[0]["nombre"] . " tiene " . $datos[0]["edad"] . " años</p>\n";
?>