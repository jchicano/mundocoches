<?php

class Valoracion {
    private $id_usuario;
    private $id_contenido;
    private $nota;
    private $comentario;
    
    
    public function __construct($id_usuario, $id_contenido, $nota, $comentario) {
        $this->id_usuario = $id_usuario;
        $this->id_contenido = $id_contenido;
        $this->nota = $nota;
        $this->comentario = $comentario;
    }
    
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
       
    
    public function __toString() {
        return "ID_usuario: $this->$id_usuario, ID_contenido: $this->$id_contenido, nota: $this->$nota, comentario: $this->$comentario";
    }
    
}
?>

