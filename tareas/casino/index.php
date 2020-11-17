<html>
<!-- La primera vez que se conecta se crea la sesión y se solicita al usuario cuanto dinero va tener disponible para apostar. Después el usuario puede realizar todas las apuestas que quiera hasta que se quede sin dinero o decida retirase.  En cada apuesta se mostrará el dinero que tiene disponible.

La apuesta consistirá en introducir una cantidad que siempre tiene que set inferior al dinero que tiene disponible. Luego puede seleccionar dos opciones PAR o IMPAR. El ordenador generará un número aleatorio que servirá como resultado de la apuesta. Si el usuario ha acertado su dinero disponible se incrementará en el valor de la apuesta. En caso contrario se reducida en la misma cantidad.

Cada vez que se cree una nueva sesión se mostrará el valor de un cookie que guarda durante un mes las visitas que ha realizado a nuestro casino online.
 -->
<head>
<meta charset="UTF-8">
<title>Casino</title>
</head>
<body>

<?php
session_start();

include_once 'app\funciones.php';
// Nueva partida
if (! isset($_SESSION['casa'])) {
    $_SESSION['casa'] = rand(1, 2);
    include_once 'app\entrada.php';
} else {
    if (isset($_REQUEST['cantidad'])){
        $cant = $_REQUEST['cantidad'];
        echo "Dispone de $cant para jugar <br/>";
        include_once 'app\casino.html';
    }
        $cliente = asignarNum($_REQUEST['apuesta']);
        if(isset($_REQUEST['orden'])){
            switch ($_REQUEST['orden']) {
                case "Apostar cantidad":
                    echo "RESULTADO DE LA APUESTA: " . $_SESSION['casa'];
                    if ($cliente == $_SESSION['casa']) {
                        $cant = ganar($_REQUEST['cantidad'], $_REQUEST['cantApostada']);
                        echo "<br/> GANASTE";
                    } else {
                        $cant =  perder($_REQUEST['cantidad'], $_REQUEST['cantApostada']);
                      echo "<br/> PERDISTE";
                    
                    }
                    echo "Dispone de $cant para jugar <br/>";
                    include_once 'app\casino.html';
                    break;
                case "Abandonar el Casino":
                    session_destroy();
                    exit();
                    break;
                    
            }
        }
}
      


?>

</body>
</html>
