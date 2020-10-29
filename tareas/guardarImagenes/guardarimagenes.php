<html>
<!-- Realizar el  programa guardarimagenes.php  que muestre un formulario web 
que permita el env�o de uno o dos fichero de im�genes que se guardar�n 
un directorio  llamado imgusers no accesible por web.  Crear el directorio 
y darle los permisos adecuados. El programa   mostrar� el formulario (GET) 
o lo procesar� (POST)
El programa PHP debe controlar:
    El tama�o m�ximo de los ficheros no puede superar los 200 Kbytes cada uno y entre los dos no mas de 300  Kbytes.
    Se puede enviar uno o dos ficheros simult�neamente.
    Los ficheros tienes que ser o JPG o PNG no se admiten otros formatos.
    La aplicaci�n NO  debe permitir subir ficheros cuyo nombres ya exista en el directorio de im�genes.
 -->
<head>
<meta charset="UTF-8">
</head>
<?php 
$codigosErrorSubida= [
    0 => 'Subida correcta',
    1 => 'El tama�o del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
    2 => 'El tama�o del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
    3 => 'El archivo no se pudo subir completamente',
    4 => 'No se seleccion� ning�n archivo para ser subido',
    5 => 'No se pudo guardar el archivo en disco',
];
$mensaje = '';
if(!isset($_FILES['imagen1']['name'])){
    $mensaje.= 'ERROR: No se ha indicado el archivo.';
} else{
    $directorioSubida = 'imgusers';
        $nombreFichero   =   $_FILES['imagen1']['name'];
        $tipoFichero     =   $_FILES['imagen1']['type'];
        $tamanioFichero  =   $_FILES['imagen1']['size'];
        $temporalFichero =   $_FILES['imagen1']['tmp_name'];
        $errorFichero    =   $_FILES['imagen1']['error'];
        $mensaje .= 'Intentando subir el archivo: ' . ' <br />';
        $mensaje .= "- Nombre: $nombreFichero" . ' <br />';
        $mensaje .= '- Tama�o: ' . number_format(($tamanioFichero / 1000), 1, ',', '.'). ' KB <br />';
        $mensaje .= "- Tipo: $tipoFichero" . ' <br />' ;
        $mensaje .= "- Nombre archivo temporal: $temporalFichero" . ' <br />';
        $mensaje .= "- C�digo de estado: $errorFichero" . ' <br />';
        
        $mensaje .= '<br />RESULTADO<br />';
        
    }
    if ($errorFichero > 0) {
        $mensaje .= "Se ha producido el error n� $errorFichero: <em>"
        . $codigosErrorSubida[$errorFichero] . '</em> <br />';
    } 
        
?>
<body>
<?php echo $mensaje; ?>
<br />
	<a href="guardarimagenes.html">Volver a la p�gina de subida</a></body>
</html>