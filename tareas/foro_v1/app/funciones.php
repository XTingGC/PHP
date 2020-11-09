<?php

/*
 * Entrada: Se muestra un formulario donde se solicita un usuario
 * y la contrase�a (figura 1)
 * Comentario: Tras comprobar que se ha accedido con usuario y
 * contrase�as correctas ( usuario con 8 o m�s caracteres y su
 * contrase�a el nombre de usuario al rev�s) se muestra un formulario
 * con campos para escribir tema de debate (asunto) y la opini�n
 * ( �rea de texto para escribir 300 como m�ximo). Si los valores
 * de usuario y contrase�a no son v�lidos se volver� mostrar el
 * formulario de acceso mostrando un error (figura 2).
 */
function usuarioOk($usuario, $contraseña): bool
{   
    return strlen($usuario)>=8 && $contraseña==strrev($usuario);
}

function letraMasRepetida($comentario)
{
    $max = 0;
    $letra = "";
    foreach (count_chars($comentario, 1) as $i => $value) {
        if (chr($i) != " ") {
            if ($value > $max) {
                $max = $value;
                $letra = chr($i);
            }
        }
    }
    return $letra;
}

function palabraMasRepetida($comentario):string
{
    $max = 0;
    $palabra="";
    $cadena = explode(" ", $comentario);
    $cadena = array_count_values($cadena);
    foreach ($cadena as $i=>$value){
        if($value>$max){
            $max = $value;
            $palabra=$i;
            
        }
    }
    return $palabra;
}
function maxLetras($comentario):string{
    if(strlen($comentario)>300){
        return "El comentario debe tener menos de 300 caracteres";
    } else {
        return $comentario;
    }
}