<html>
<!-- La primera vez que se conecta se crea la sesi�n y se solicita al usuario cuanto dinero va tener disponible para apostar. Despu�s el usuario puede realizar todas las apuestas que quiera hasta que se quede sin dinero o decida retirase.  En cada apuesta se mostrar� el dinero que tiene disponible.

La apuesta consistir� en introducir una cantidad que siempre tiene que set inferior al dinero que tiene disponible. Luego puede seleccionar dos opciones PAR o IMPAR. El ordenador generar� un n�mero aleatorio que servir� como resultado de la apuesta. Si el usuario ha acertado su dinero disponible se incrementar� en el valor de la apuesta. En caso contrario se reducida en la misma cantidad.

Cada vez que se cree una nueva sesi�n se mostrar� el valor de un cookie que guarda durante un mes las visitas que ha realizado a nuestro casino online.
 -->
<head>
<meta charset="UTF-8">
<title>Casino</title>
</head>
<body>

<?php
session_start();
$inicio = 0;
if ( isset($_COOKIE['inicio'])){
    $inicio = $_COOKIE['inicio'];
}
include_once 'app\funciones.php';
// Nueva partida
if (! isset($_SESSION['casa'])) {
    $_SESSION['casa'] = rand(1, 2);
    $_SESSION['fichas'] = "";
    include_once 'app\entrada.php';
} else {
    if (isset($_REQUEST['cantidad'])) {
        $_SESSION['fichas'] = $_REQUEST['cantidad'];
        echo "Dispone de " . $_SESSION['fichas'] . " para jugar <br/>";
        include_once 'app\casino.html';
    } else {

        if (isset($_REQUEST['orden'])) {
            switch ($_REQUEST['orden']) {
                case "Entrar":

                case "Apostar cantidad":

                    if (isset($_REQUEST['apuesta']) && isset($_REQUEST['cantApostada'])) {
                        $_SESSION['casa'] = rand(1, 2);
                        $cliente = asignarNum($_REQUEST['apuesta']);
                        $fichasApostadas = $_REQUEST['cantApostada'];
                        if ($fichasApostadas < $_SESSION['fichas']) {
                            echo "RESULTADO DE LA APUESTA: " . $_SESSION['casa'];
                            if ($cliente === $_SESSION['casa']) {
                                $_SESSION['fichas'] = ganar($_SESSION['fichas'], $fichasApostadas);

                                echo "<br/> GANASTE <br/> ";
                            } else {
                                $_SESSION['fichas'] = perder($_SESSION['fichas'], $fichasApostadas);

                                echo "<br/> PERDISTE <br/> ";
                            }
                        } else {
                            echo "Error: no dispone de $fichasApostadas euros disponibles.";
                        }
                    } else {
                        echo "Le falta alg�n dato";
                    }
                    if ($_SESSION['fichas'] === 0){
                        echo "No dispone de dinero";
                        $inicio++;
                        setcookie("inicio",$inicio, time()+ 30 * 24 * 3600);
                        session_destroy();
                        exit();
           
                    }
                    echo "Dispone de " . $_SESSION['fichas'] . " para jugar <br/>";
                    $inicio++;
                    setcookie("inicio",$inicio, time()+ 30 * 24 * 3600);
                    include_once 'app\casino.html';
                    break;
                case "Abandonar el Casino":
                    $inicio++;
                    setcookie("inicio",$inicio, time()+ 30 * 24 * 3600);
                    session_destroy();
                    exit();
                    break;
            }
        }
    }
}

?>

</body>
</html>
