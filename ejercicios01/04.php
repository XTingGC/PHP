<?php
/*
 * Generar números al azar entre 1 y 10 hasta que se generen 3 veces el valor 6 de forma consecutiva en ese caso se mostrará cuantos número se han generado.

Han salido tres 6 seguidos tras genera 1343 números en 1.002 milisegundos

 */
$cont = 0;
$cont6 = 0;
while ($cont6 < 3) {
    $num = random_int(1, 10);
    $cont ++;

    if ($num == 6) {
        $cont6 ++;
    } else {
        $cont6 = 0;
    }
}
$tiempo = microtime(true);
echo "Han salido tres 6 seguidos tras generar $cont numeros en  $tiempo milisegundos";