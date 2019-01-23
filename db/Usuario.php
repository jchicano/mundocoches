<?php

class Usuario {
    private $id;
    private $email;
    private $pass;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $fecha_nac;
    private $pais;
    private $cod_postal;
    private $telefono;
    private $rol;
    
    
    public function __construct($id, $email, $pass, $nombre, $apellido1, $apellido2, $fecha_nac, $pais, $cod_postal, $telefono, $rol) {
        $this->id = $id;
        $this->email = $email;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fecha_nac = $fecha_nac;
        $this->pais = $pais;
        $this->cod_postal = $cod_postal;
        $this->telefono = $telefono;
        $this->rol = $rol;
    }
    
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
       
    
    public function __toString() {
        return "ID: $this->$id, email: $this->$email, pass: $this->$pass, nombre: $this->$nombre, apellido1: $this->apellido1, apellido2: $this->apellido2, fecha_nac: $this->$fecha_nac, pais: $this->$pais, cod_postal: $this->$cod_postal, teleofono: $this->telefono, rol: $this->$rol";
    }
    
}
?>

