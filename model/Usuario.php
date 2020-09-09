<?php
class Usuario extends EntidadBase{
    private $id; // atributos que estan en la tabla en la base de datos
    private $nombre; 
    private $apellido; 
    private $email; 
    private $password; 
     
    public function __construct() {
        $table="usuarios";
        parent::__construct($table);
    }
     
    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getNombre() {
        return $this->nombre;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
 
    public function getApellido() {
        return $this->apellido;
    }
 
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
 
    public function getEmail() {
        return $this->email;
    }
 
    public function setEmail($email) {
        $this->email = $email;
    }
 
    public function getPassword() {
        return $this->password;
    }
 
    public function setPassword($password) {
        $this->password = $password;
    }
 
    public function save(){ /* Método que guarda todo lo que setiemos(set) dentro del controlador o donde sea. 
                               Para guardarlo en la Base de Datos */
        $query="INSERT INTO usuarios (id,nombre,apellido,email,password)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',
                       '".$this->password."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
 
}
?>
