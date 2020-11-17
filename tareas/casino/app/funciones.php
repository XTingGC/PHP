<?php
// devuelve true si ha ganado y false si ha perdido.
function asignarNum($num)
{
    switch ($num){
        case "par":
            $num = 2;
            break;
        case "impar":
            $num = 1;
            break;
    }
    return $num;
}

function ganar($cantInicial, $cantApostada) {

    return  $cantInicial + $cantApostada;
}

function perder($cantInicial, $cantApostada) {
    return $cantInicial - $cantApostada;
}
