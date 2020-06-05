<?php 
   
  Class EntidadBase{ /* De esta clase van a heredar los modelos de las entidades 
      que representan la base de datos (Cada tabla será una entidad) */

      private $table;
      private $db;
      private $conectar;

      public function __construct($table){

          $this->table=(string) $table;


          require_once 'Conectar.php';
          $this->conectar=new Conectar();
          $this->db=$this->conectar->conexion();
      }

      public function getConectar(){ /* Este método nos permite sacar la conexión a la base de datos desde otro sitio 
      	                                y que luego la llamemos */

      	  return $this->conectar;
      }

      public function db(){ /* Este método nos permite sacar la conexión a la base de datos desde otro sitio 
      	                                y que luego la llamemos y se podra utilizar en las entidades que queremos */

      	  return $this->db;
      }


      public function getAll(){ // Método que realiza una consulta a la base de datos, indicando que tabla deseamos consultar.

          $query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

          //Devolvemos el resulset en forma de array de objetos

              while ($row = $query->fetch_object()){

              	  $resultSet[]=$row;
              }

              return $resulSet;
      }

      public function getById($id){ // Método que realiza una consulta por id a la base de datos
        $query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");
 
        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
         
        return $resultSet;
    }
     
    public function getBy($column,$value){ // Método que realiza una consulta según el valor de columna que le indiquemos
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
 
        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
         
        return $resultSet;
    }
     
    public function deleteById($id){ // Método que permite eliminar registro según el id que le indiquemos.
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }
     
    public function deleteBy($column,$value){ 
        $query=$this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }
     
 
    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */


  }
?>