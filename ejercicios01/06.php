

<html>
<!-- Generar la  tabla de multiplicar de un número elegido al azar entre 1 y 10 con la siguiente apariencia -->
<head>
<style>
div {
  background: blue;
  text-align: center;
  padding: 20px;
  color: white;
  text-shadow: black 0.1em 0.1em 0.2em;
}
table, th, td{
border: 1px solid black;
border-collapse: collapse;
}
</style>
</head>
<body>
<div><h1>TABLA DE MULTIPLICAR</h1></div>
<table>
<tr>
<th>Tabla del <?= $num = rand(1,10)?></th>
</tr>
<?php 


for($i=1;$i<=10;$i++){
    $resu = $num*$i;
    echo "<tr><td> $num x $i = </td><td>".$resu."</td></tr>";
}

?>
</table>
</body>
</html>