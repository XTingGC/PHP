<?php
/*
 * Obtener un n�mero al azar entre 1 y 9 y generar una pir�mide con ese n�mero de pelda�os.
Utilizar la marca <code></code> para que la visualizaci�n no se deforme por el tama�o de los espacio o una estilo con tipo de letra monospace.
N�mero generado 5

    *
   ***
  *****
 *******
*********

 */
$tam=random_int(1, 9);

for($i=1;$i<$tam+1;$i++){
    for($j=$tam+($tam/2);$j>$i;$j--){
        echo "&nbsp;&nbsp;";
    }
    for($k=1;$k<=2*$i-1;$k++){
        echo "<code>*</code>";
    }
    echo "</br>";
}

?>

