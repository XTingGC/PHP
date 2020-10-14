
<html>
<head>
<title>Piedra, papel, tijeras</title>
<meta charset="UTF-8" />
<style>
    table{
    font-weight: bold;
    }
	div{
	font-size:350%;
	}
</style>

</head>
<body>

	<h1>¡Piedra, papel, tijera!</h1>
	<p>Actualice la página para mostrar otra partida</p>
	<table>
		<tr>
			<td>Jugador 1</td>
			<td>Jugador 2</td>
		</tr>
	

<?php
define('PIEDRA1', "&#x1F91C;");
define('PIEDRA2', "&#x1F91B;");
define('PAPEL', "&#x1F91A;");
define('TIJERAS', "&#x1F596;");

$jugador1 = rand(1, 3);
$jugador2 = rand(1, 3);
$ganador = calcularGanador($jugador1, $jugador2);

echo "<tr><td><div>".imagenJugador1($jugador1)."</div></td><td><div>".imagenJugador2($jugador2)."</div></td></tr>";
echo "<tr><td colspan = '2'>".mostrarGanador($ganador)."</td></tr>";

function imagenJugador1($jugador1) {
    switch($jugador1) {
        case 1: return PIEDRA1;
        case 2: return PAPEL;
        case 3: return TIJERAS;
    }
}
function imagenJugador2($jugador2) {
    switch($jugador2) {
        case 1: return PIEDRA2;
        case 2: return PAPEL;
        case 3: return TIJERAS;
    }
}
function calcularGanador($jugador1, $jugador2){
    if ($jugador1 == $jugador2) {
        return 0;
    }
    else {
        switch ($jugador1)
        {
            case 1:
                switch ($jugador2)
                {
                    case 2: return 2;
                    case 3: return 1;
                    default: return 0;
                }
            case 2:
                switch ($jugador2)
                {
                    case 1: return 1;
                    case 3: return 2;
                    default: return 0;
                }
            case 3:
                switch ($jugador2)
                {
                    case 1: return 2;
                    case 2: return 1;
                    default: return 0;
                }
            default: return 0;
            
        }
    }
}
function mostrarGanador($ganador) {
    switch ($ganador){
        case 0: return "¡Empate!";
        case 1: return "Ha ganado el jugador 1";
        case 2: return "Ha ganado el jugador 2";
    }
}

?>
</table>
</body>
</html>