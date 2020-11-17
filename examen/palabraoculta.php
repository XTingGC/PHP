<html>
<head>
<meta charset="UTF-8">
<title>Palabra oculta</title>
</head>
<body>
<?php
define('MAXINTENTOS',5);
function elegirPalabra(){
    static $tpalabras = ["Madrid","Sevilla","Murcia","Málaga","Mallorca","Menorca"];
    $clave = array_rand($tpalabras,1);
    return $tpalabras[$clave];// Devuelve una palabra al azar
}

function comprobarLetra($letra,$cadena){
    if(strpos($cadena, $letra) === false){
        return false;
    }else{
        return true;
        }// Devuelve true o false si la letra esta en la cadena
}


/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición    si cada letra se encuentra en la cadenaletras
 *
 * Ej  generaPalabraconHuecos("aeiou"     ,"hola pepe") -->"-o-a--e-e"
 *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
 *
 */

function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra) {
    
    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    $letra= $cadenaletras;
    for ($i = 0; $i<strlen($resu); $i++){
        if(comprobarLetra($letra, $resu)== false){
            $resu[$i] = '-';
        }else{
            if($resu[$i] == $letra){
                $resu[$i] = $letra;
            }else{
                $resu[$i] = '-';
            }
            
            }
    }
    // COMPLETAR rellenado la cadena resu
    
    
    
    return $resu;
}
session_start();
if (! isset($_SESSION['palabrasecreta'])) {
    $_SESSION['palabrasecreta'] = elegirPalabra();
    $_SESSION['palabrausuario'] = ""; // Inicialmente no tiene ninguna letra
    $_SESSION['fallos'] = 0; // Inicialmente no hay ningún fallo
    echo "PALABRA: ".generaPalabraconHuecos($_SESSION['palabrausuario'], $_SESSION['palabrasecreta'])."<br/>";
}else{
    if(isset ($_REQUEST['palabrausuario'])){
        $cadenaletras = $_REQUEST['palabrausuario'];
        $cadenapalabra = $_SESSION['palabrasecreta'];
        
        if(comprobarLetra($cadenaletras, $cadenapalabra) !== false){
            echo "<p>PALABRA: ".generarPalabraconHuecos($cadenaletras,$cadenapalabra)."</p>";
            echo "has acertado una letra";
        } else{
            $_SESSION['fallos']++;
            
            if($_SESSION['fallos'] > MAXINTENTOS){
                echo "Has perdido <br/>";
                session_destroy();
                exit();
            }
        }
    }
}

?>
<form method="get">
Introduce una letra <input name="palabrausuario" type="text" size="5">
</form>


