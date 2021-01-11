<?php 

include_once 'config.php';
include_once 'util.php';
include_once "Usuario.php";
/* DATOS DE USUARIO
• Identificador ( 5 a 10 caracteres, no debe existir previamente, solo letras y números)
• Contraseña ( 8 a 15 caracteres, debe ser segura)
• Nombre ( Nombre y apellidos del usuario
• Correo electrónico ( Valor válido de dirección correo, no debe existir previamente)
• Tipo de Plan (0-Básico |1-Profesional |2- Premium| 3- Máster)
• Estado: (A-Activo | B-Bloqueado |I-Inactivo )
*/
// Inicializo el modelo 
// Cargo los datos del fichero a la session
//todo lo que tenga sesion habr� que modificar para bbdd//vamos a usar pdo en vez de msqli
class modeloUser {
    
    private static $dbh = null;
    private static $consulta_exusuario = "Select identificador from Usuarios where identificador=:identificador";
    private static $consulta_usuarioclave = "Select identificador from Usuarios where identificador=:identificador and clave=:clave";
    private static $consulta_email = "Select email from Usuarios where identificador=:identificador";
    private static $consulta_exemail = "Select email from Usuarios where email=:email";
    private static $consulta_plan = "Select plan from Usuarios where identificador=:identificador";
    private static $consulta_borrar = "delete from Usuarios where identificador=:identificador";
    private static $consulta_usuarios = "select * from Usuarios";
    
public static function init() {
    
    if(self::$dbh == null){
  
    try{
        $dsn = "mysql:host=localhost;dbname=Usuarios;charset=utf8";
        self::$dbh = new PDO($dsn, "root", "root");
        self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Error de conexi�n".$e->getMessage();
        exit();
    }
    }

      
}

// Comprueba usuario y contraseña son correctos (boolean)
public static function modeloOkUser($user,$clave){
    $cons = self::$dbh->prepare(self::$consulta_usuarioclave);
    $cons->bindValue(1,$user);
    $cons->bindValue(2, $clave);
    $cons->execute();
    if($cons->rowCount()>0){
        return true;
       
    }else {
        return false;
    }
}


public static function modeloExisteID(String $user):bool{
    $cons = self::$dbh->prepare(self::$consulta_exusuario);
    $cons->bindValue(':identificador',$user->identificador);
    $cons->execute();
    if($cons->rowCount()>0){
        return true;
        
    }else {
        return false;
    }
}

public static function modeloGetEmail(String $user){
    $cons = self::$dbh->prepare(self::$consulta_email);
    $cons->bindValue(':identificador',$user->identificador);
    $cons->execute();
    $resu = $cons->fetch('email');
    return $resu;
    //$_SESSION['tusuarios'][$user][2];
}


/*
 * Chequea si hay error en el datos antes de guardarlos
 */
public static function modeloErrorValoresAlta ($user,$clave1, $clave2, $nombre, $email, $plan, $estado){
    if ( modeloExisteID($user))                         return USREXIST; 
    if ( preg_match("/^[a-zA-Z0-9]+$/", $user) == 0)      return USRERROR;
    if ( $clave1 != $clave2 )                           return PASSDIST;
    if ( !modeloEsClaveSegura($clave1) )                return PASSEASY;
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL))    return MAILERROR;
    if ( modeloExisteEmail($email))                     return MAILREPE;
    return false;
}

public static function modeloErrorValoresModificar($user, $clave1, $clave2, $nombre, $email, $plan, $estado){
    
    if ( $clave1 != $clave2 )                           return PASSDIST;
    if ( !modeloEsClaveSegura($clave1) )                return PASSEASY;
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL))    return MAILERROR;
    // SI se cambia el email
    $emailantiguo = modeloGetEmail($user);
    if ( $email != $emailantiguo && modeloExisteEmail($email))   return MAILREPE;
    return false;
}

/*
 * Comprueba que la contraseña es segura
 */

public static function modeloEsClaveSegura (String $clave):bool {
    if ( empty($clave))         return false;
    if (  strlen($clave) < 8 )  return false;
    if ( !hayMayusculas($clave) || !hayMinusculas($clave)) return false;
    if ( !hayDigito($clave))         return false;
    if ( !hayNoAlfanumerico($clave)) return false;

    return true;
}


/*
 * Comprueba si un correo existe
 */
public static function modeloExisteEmail( String $email):bool{
    $cons = self::$dbh->prepare(self::$consulta_exemail);
    $cons->bindValue(':email',$email->email);
    $cons->execute();
    if($cons->rowCount()>0){
        return true;
        
    }else {
        return false;
    }
}




// Devuelve el plan de usuario (String)
public static function modeloObtenerTipo($user){
    $cons = self::$dbh->prepare(self::$consulta_plan);
    $cons->bindValue(':identificador',$user->identificador);
    $cons->execute();
    $resu = $cons->fetch('plan');
    
    return $resu;
    
    //$cod = $_SESSION['tusuarios'][$user][3];
    //return PLANES[$cod];
}

// Borrar un usuario (boolean)
public static function modeloUserDel($userid){
    $cons = self::$dbh->prepare(self::$consulta_borrar);
    $cons->bindValue(':identificador',$userid->identificador);
    $cons->execute();
    if($cons->rowCount()>0){
        return true;
        
    }else {
        return false;
    }
  /* if (isset($_SESSION['tusuarios'][$userid])){
        unset($_SESSION['tusuarios'][$userid]);
        return true;
    } 
    return false;*/
}
// Añadir un nuevo usuario (boolean)
public static function modeloUserAdd($userid, $userdat){
   
    
    
    if (! isset($_SESSION['tusuarios'][$userid])){
        $_SESSION['tusuarios'][$userid]= $userdat;
        return true;
    }   
   return false; // Identificador repetido
}

// Actualizar un nuevo usuario (boolean)
public static function modeloUserUpdate ($userid, $userdat){
    
    if ( isset($_SESSION['tusuarios'][$userid])){
        $_SESSION['tusuarios'][$userid]= $userdat;
        return true;
    }
    return false; // Identificador no existe
}


// Tabla de todos los usuarios para visualizar
public static function modeloUserGetAll (){
    // Genero lo datos para la vista que no muestra la contraseña ni los códigos de estado o plan
    // sino su traducción a texto
    
    //aqui hay que poner un selec* usuarios para trabajar con bbdd
    //obtener los valores y meterlos en esta tabla.

    $tuservista=[];
    $cons = self::$dbh->prepare(self::$consulta_usuarios);
    $cons->execute();
    while ($user = $cons->fetch()) {
        $tuservista[]= $user;
    }
    return $tuservista;
    /*foreach ($_SESSION['tusuarios'] as $clave => $datosusuario){
        $tuservista[$clave] = [$datosusuario[1],
                               $datosusuario[2],
                               PLANES[$datosusuario[3]],
                               ESTADOS[$datosusuario[4]]
                               ];
    }*/

}



// Datos de un usuario para visualizar
public static function modeloUserGet ($userid){
    if ( isset($_SESSION['tusuarios'][$userid])){
        return $_SESSION['tusuarios'][$userid];
    }
    return null;
}

// Vuelca los datos al fichero
public static function modeloUserSave(){
    
    $datosjon = json_encode($_SESSION['tusuarios']);
    file_put_contents(FILEUSER, $datosjon) or die ("Error al escribir en el fichero.");
}
}