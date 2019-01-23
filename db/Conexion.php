<?php
class Conexion extends mysqli {
    private $host = "localhost"; //PRODUCCION Esto se cambiaria en el entorno de produccion
    private $user = "b22_23036480";
    private $pass = "DAWmundocoches321";
    private $db = "b22_23036480_uno";
    
    
    public function __construct() {
        parent::__construct($this->host, $this->user, $this->pass, $this->db);
        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
            exit;
        }
    }
}
?>