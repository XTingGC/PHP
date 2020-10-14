<html>
<!-- Realizar un segunda versión del primer ejercicio donde la página de resultado tiene que 
mostrar una tabla con el siguiente  formato utilizando estilo.

1º Número : 5  
2º Número : 2
 
Operación	Resultado
5 + 2	7
5 - 2	3
5 * 2	10
5 / 2	  2.4
5 % 2	1
52	25
 -->
<head>
<style>
table, td, th{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  border: 1px solid black;
}


th{

    background-color: #909090;
    color: #1F70A2;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<?php
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
echo "<table>
<tr>
<th align='left'>Opereción</th>
<th align='right'>Resultado</th>
</tr>
<tr>
<td>$num1 + $num2</td>
<td align='right'>$sum</td>
</tr>
<tr>
<td>$num1 - $num2</td>
<td align='right'>$res</td>
</tr>
<tr>
<td>$num1 * $num2</td>
<td align='right'>$mul</td>
</tr>
<tr>
<td>$num1 / $num2</td>
<td align='right'>$div</td>
</tr>
<tr>
<td>$num1 % $num2</td>
<td align='right'>$mod</td>
</tr>
<tr>
<td>$num1 ** $num2</td>
<td align='right'>$pot</td>
</tr>
</table>";


?>
</body>
</html>
