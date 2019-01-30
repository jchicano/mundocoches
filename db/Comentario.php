<?php

class Comentario {
    private $nombre_usuario;
    private $rol_usuario;
    private $nota_contenido;
    private $comentario_contenido;
    
    
    public function __construct($nombre_usuario, $rol_usuario, $nota_contenido, $comentario_contenido) {
        $this->nombre_usuario = $nombre_usuario;
        $this->rol_usuario = $rol_usuario;
        $this->nota_contenido = $nota_contenido;
        $this->comentario_contenido = $comentario_contenido;
    }
    
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
       
    
    public function __toString() {
        return "nombre_usuario: $this->$nombre_usuario, rol_usuario: $this->rol_usuario, nota_contenido: $this->$nota_contenido, comentario_contenido: $this->$comentario_contenido";
    }
    
}
?>

