<?php
class ModeloBase extends EntidadBase{ // Se hereda todo lo que hay en la clase EntidadBase
    private $table;
    private $fluent;
     
    public function __construct($table) {
        $this->table=(string) $table;
        parent::__construct($table); // Aquí llamamos el constructor heredado y le pasamos la table
         
        $this->fluent=$this->getConetar()->startFluent();
    }
     
    public function fluent(){
        return $this->fluent;
    }
     
    public function ejecutarSql($query){ /* Método encargado de saber si la query va a devolver muchos resultados 
                                            o si solo va a devolver uno. En el caso de que sean muchos resultados,
                                            los va a recorrer, va a crear un array de objetos */
        $query=$this->db()->query($query); 
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row; // Array de objetos
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }
     
    //Aqui podemos montarnos métodos para los modelos de consulta
     
}
?>
