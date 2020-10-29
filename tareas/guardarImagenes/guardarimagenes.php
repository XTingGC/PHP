<?php
/*
 * Realizar el programa guardarimagenes.php que muestre un formulario web
 * que permita el env�o de uno o dos fichero de im�genes que se guardar�n
 * un directorio llamado imgusers no accesible por web. Crear el directorio
 * y darle los permisos adecuados. El programa mostrar� el formulario (GET)
 * o lo procesar� (POST)
 * El programa PHP debe controlar:
 * El tama�o m�ximo de los ficheros no puede superar los 200 Kbytes cada uno y entre los dos no mas de 300 Kbytes.
 * Se puede enviar uno o dos ficheros simult�neamente.
 * Los ficheros tienes que ser o JPG o PNG no se admiten otros formatos.
 * La aplicaci�n NO debe permitir subir ficheros cuyo nombres ya exista en el directorio de im�genes.
 */
$mensaje='';
// director;io de subida
$directorioSubida = 'D:\imgusers';
$sum = $_FILES['imagen2']['size']+$_FILES['imagen1']['size'];
$nombreFichero = $_FILES['imagen1']['name'];
$tipoFichero = $_FILES['imagen1']['type'];
$tamanioFichero = $_FILES['imagen1']['size'];
$temporalFichero = $_FILES['imagen1']['tmp_name'];
$errorFichero = $_FILES['imagen1']['error'];

$mensaje .= 'Intentando subir el archivo: ' . ' <br />';
$mensaje .= "- Nombre: $nombreFichero" . ' <br />';
$mensaje .= '- Tama�o: ' . number_format(($tamanioFichero / 1000), 1, ',', '.') . ' KB <br />';
$mensaje .= "- Tipo: $tipoFichero" . ' <br />';
$mensaje .= "- Nombre archivo temporal: $temporalFichero" . ' <br />';
$mensaje .= "- C�digo de estado: $errorFichero" . ' <br />';

$mensaje .= '<br />RESULTADO<br />';
   
if ($errorFichero > 0) {
    $mensaje .= "Se ha producido el error: $errorFichero:" . errorSubida($errorFichero) . ' <br />';
} else { // subida correcta del temporal
         // si es un directorio y tengo permisos y si el formato es el correcto
    if(!file_exists($directorioSubida . '/' . $nombreFichero)){
    if($sum<300000){
    if (is_dir($directorioSubida) && is_writable($directorioSubida) && formatoImagen($nombreFichero) == true) {
       
        if (move_uploaded_file($temporalFichero, $directorioSubida . '/' . $nombreFichero) == true) {
            $mensaje .= 'Archivo guardado en: ' . $directorioSubida . '/' . $nombreFichero . ' <br/>';
        }
    } else {
        $mensaje .= "El formato no es v�lido. Solo se aceptan archivos JPG y PGN <br />";
    }}else{
        $mensaje .= "El tama�o de ambos archivos excede el l�mite. <br />";
    }}else{
        $mensaje .= "La imagen ya existe. <br />'";
    }
}

$nombreFichero = $_FILES['imagen2']['name'];
$tipoFichero = $_FILES['imagen2']['type'];
$tamanioFichero = $_FILES['imagen2']['size'];
$temporalFichero = $_FILES['imagen2']['tmp_name'];
$errorFichero = $_FILES['imagen2']['error'];

$mensaje .= ' <br /> Intentando subir el archivo: ' . ' <br />';
$mensaje .= "- Nombre: $nombreFichero" . ' <br />';
$mensaje .= '- Tama�o: ' . number_format(($tamanioFichero / 1000), 1, ',', '.') . ' KB <br />';
$mensaje .= "- Tipo: $tipoFichero" . ' <br />';
$mensaje .= "- Nombre archivo temporal: $temporalFichero" . ' <br />';
$mensaje .= "- C�digo de estado: $errorFichero" . ' <br />';

$mensaje .= '<br />RESULTADO<br />';
//suma del tama�o de ambos ficheros
$sum = $_FILES['imagen2']['size']+$_FILES['imagen1']['size'];
if ($errorFichero > 0) {
    $mensaje .= "Se ha producido el error: $errorFichero:" . errorSubida($errorFichero) . ' <br />';
} else { // subida correcta del temporal
    // si es un directorio y tengo permisos y si el formato es el correcto
    if(!file_exists($directorioSubida . '/' . $nombreFichero)){
    if($sum<300000){
    if (is_dir($directorioSubida) && is_writable($directorioSubida) && formatoImagen($nombreFichero) == true) {
        
        if (move_uploaded_file($temporalFichero, $directorioSubida . '/' . $nombreFichero) == true) {
            $mensaje .= 'Archivo guardado en: ' . $directorioSubida . '/' . $nombreFichero . ' <br/>';
        }
    } else {
        $mensaje .= "El formato no es v�lido. Solo se aceptan archivos JPG y PGN <br />";
    }}else{
        $mensaje .= "El tama�o de ambos archivos excede el l�mite.";
    }}else{
        $mensaje .= "La imagen ya existe.";
    }
}


function errorSubida($errorFichero)
{
    $codigosErrorSubida = [
        0 => 'Subida correcta',
        1 => 'El tama�o del archivo excede el admitido por el servidor', // directiva upload_max_filesize en php.ini
        2 => 'El tama�o del archivo excede el admitido por el cliente', // directiva MAX_FILE_SIZE en el formulario HTML
        3 => 'El archivo no se pudo subir completamente',
        4 => 'No se seleccion� ning�n archivo para ser subido',
        6 => 'No existe un directorio temporal donde subir el archivo',
        7 => 'No se pudo guardar el archivo en disco',
        8 => 'Una extensi�n PHP evito la subida del archivo'
    ];
    return $codigosErrorSubida[$errorFichero];
}

function formatoImagen($nombreFichero)
{
    
    $formato = array(
        'jpg',
        'png'
    );
    $array_formato = explode('.', $nombreFichero);
    $contador = count($array_formato);
    $extension = strtolower($array_formato[-- $contador]);
       return in_array($extension, $formato);
} 


?>
<html>
<head>
<meta charset="UTF-8">
</head>

<body>
<?php echo $mensaje;?>
<br />
	<a href="guardarimagenes.html">Volver</a>
</body>
</html>