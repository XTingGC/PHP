

<?php
/*
 * Definir dos variables asign�ndoles un valor entero aleatorio entre 1 y 10 y mostrar su suma, 
 * su resta, su divisi�n, su multiplicaci�n, m�dulo y potencia (ciclo for)
 * 1� N�mero : 5  
2� N�mero : 2
 
5+3  = 7
5-2  = 3
5*2  = 10
5/ 2 = 2.5
5%2  = 1
5**2 = 25

 */
$num1 = random_int(1, 10);
$num2 = random_int(1, 10);
$sum = $num1 + $num2;
$res = $num1 - $num2;
$mul = $num1 * $num2;
$div = $num1 / $num2;
$mod = $num1 % $num2;
$pot = $num1;

for ($i = 1; $i < $num2; $i++) {
    if($num2==1){
        $pot = $num1;
        break;
    }
    $pot = $pot * $num1;
}

echo "$num1+$num2 = $sum <br/>
$num1-$num2 = $res <br/>
$num1*$num2 = $mul <br/>
$num1/$num2 = $div <br/>
$num1%$num2 = $mod <br/>
$num1**$num2 = $pot";

?>