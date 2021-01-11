<?php
class Usuario
{
    private $identificador;
    private $clave;
    private $nombre;
    private $email;
    private $plan;
    private $estado;
    
    public function __construct($user,$clave,$nombre,$plan,$estado){
        $this->identificador = $user;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->plan = $plan;
        $this->estado = $estado;
        
    }
    
    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con método mágico
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }
    
}