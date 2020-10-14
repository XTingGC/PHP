<?php
/*
 * Obtener un número al azar entre 1 y 9 y generar una la escalera numérica
 *  del tamaño indicado alternando colores entre rojo y azul.
 *  Número generado 5
1
22
333
4444
55555

 */
$num = random_int(1, 9);
for ($i = 1; $i <= $num; $i ++) {
    for ($j = 0; $j < $i; $j ++) {
        if ($i % 2 == 0) {
            echo "<span style='color:blue';> $i </span>";
        } else {
            echo "<span style='color:red';> $i </span>";
        }
    }
    echo "<br/>";
}
?>