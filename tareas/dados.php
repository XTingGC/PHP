<?php
/*
 * El programa tendrá una sola página:

    Para cada jugador se mostrarán cinco dados, generados al azar. Los dibujos de los dados se encuentran en el directorio img, codificados como N.svg, donde N es el número (del 1 al 6).
    Se indicará la puntuación correspondiente a cada jugador, teniendo en cuenta que la puntuación es la suma de todos los dados menos el valor más bajo y el valor más alto.
    Se indicará qué jugador ha ganado.

Al actualizar la página, se mostrará una nueva jugada.
 */
define('UNO', "&#9856;");
define('DOS', "&#9857;");
define('TRES', "&#9858;");
define('CUATRO', "&#9859;");
define('CINCO', "&#9860;");
define('SEIS', "&#9861;");

$dados = [UNO,DOS,TRES,CUATRO,CINCO,SEIS];
for ($i = 0; $i < 5; $i++) {
    $jugador1[$i] = rand(1,6);
}
for ($i = 0; $i < 5; $i++) {
    $jugador2[$i] = rand(1,6);
}
$mostrar = var_dump($jugador1);
$mostrar2 = var_dump($jugador2);
$sum= array_sum($jugador1);
$sum2 = array_sum($jugador2);
$min1 = min($jugador1);
$max1 = max($jugador1);



?>
<html>
<head>
</head>
<body>
	<h1>CINCO DADOS</h1>
	<p>Actualice la página para mostrar una nueva tirada.</p>
	<table>
		<tr>
			<td>Jugador 1</td>
			<td><?= $sum;?></td>
			<td style="background-color:red;"><?= $min1;?></td>
			<td><?= $max1;?></td>
		</tr>
		<tr>
			<td>Jugador 2</td>
			<td><?= $sum2;?></td>
		</tr>
		<tr>
			<td>Resultado</td>
		</tr>
	</table>
</body>
</html>

