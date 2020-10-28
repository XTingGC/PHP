<?php
/*
 * El programa tendrá una sola página:
 * Para cada jugador se mostrarán cinco dados, generados al azar. Los dibujos de los dados se encuentran en el directorio img, codificados como N.svg, donde N es el número (del 1 al 6).
 * Se indicará la puntuación correspondiente a cada jugador, teniendo en cuenta que la puntuación es la suma de todos los dados menos el valor más bajo y el valor más alto.
 * Se indicará qué jugador ha ganado.
 * Al actualizar la página, se mostrará una nueva jugada.
 */
define('UNO', "&#9856;");
define('DOS', "&#9857;");
define('TRES', "&#9858;");
define('CUATRO', "&#9859;");
define('CINCO', "&#9860;");
define('SEIS', "&#9861;");

$dados = [
    UNO,
    DOS,
    TRES,
    CUATRO,
    CINCO,
    SEIS
];

for ($i = 0; $i < 5; $i ++) {
    $jugador1[$i] = rand(1, 6);
}

for ($i = 0; $i < 5; $i ++) {
    $jugador2[$i] = rand(1, 6);
}
$sum1 = array_sum($jugador1) - max($jugador1) - min($jugador1);
$sum2 = array_sum($jugador2) - max($jugador2) - min($jugador2);

function dadosJugador($dados, $jugador)
{
    for ($i = 0; $i < 5; $i ++) {
        echo $dados[$jugador[$i] - 1];
    }
}

function calcularGanador($sum1, $sum2)
{
    if ($sum1 > $sum2) {
        echo "Ha ganado el jugador 1";
    } else {
        echo "Ha ganado el jugador 2";
    }
}


?>
<html>
<head>
<style>
.rojo {
	font-size: 350%;
	border: red 5px solid;
}

.azul {
	font-size: 350%;
	border: blue 5px solid;
}
</style>
</head>
<body>
	<h1 style="text-align: center;">CINCO DADOS</h1>
	<p>Actualice la página para mostrar una nueva tirada.</p>
	<table>
		<tr>
			<td><b>Jugador 1</b></td>
			<td><div class="rojo"><?= dadosJugador($dados,$jugador1);?></div></td>
			<td><b><?= $sum1;?> puntos</b></td>

		</tr>
		<tr>
			<td><b>Jugador 2</b></td>
			<td><div class="azul"><?= dadosJugador($dados,$jugador2);?></div></td>
			<td><b><?= $sum2;?> puntos</b></td>
		</tr>
		<tr>
			<td colspan='2'><b>Resultado </b><?= calcularGanador($sum1, $sum2);?></td>
		</tr>
	</table>
</body>
</html>