<?php

/*
 * Entrada: Se muestra un formulario donde se solicita un usuario
 * y la contraseña (figura 1)
 * Comentario: Tras comprobar que se ha accedido con usuario y
 * contraseñas correctas ( usuario con 8 o más caracteres y su
 * contraseña el nombre de usuario al revés) se muestra un formulario
 * con campos para escribir tema de debate (asunto) y la opinión
 * ( área de texto para escribir 300 como máximo). Si los valores
 * de usuario y contraseña no son válidos se volverá mostrar el
 * formulario de acceso mostrando un error (figura 2).
 */
function usuarioOk($usuario, $contraseÃ±a): bool
{   
    return strlen($usuario)>=8 && $contraseÃ±a==strrev($usuario);
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