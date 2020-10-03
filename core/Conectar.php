<?php 
/**
 * Clase encargada de conectar con la base de datos
 */
class Conectar{

        private $driver;
        private $host, $user, $pass, $database, $charset; /* Atributos de clase, que es todo lo que hemos configurado
                                                                      en config/database.php */

	public function __construct(){ /* Constructor que devuelve el array creado en config/database.php
	                                  y cada uno de los valores del array los metemos en los atributos */

        $db_cfg = require_once 'config/database.php'; /* Se guarda dentro de esta variable el array devuelto
                                                         en el archivo config/database.php */

        //Se guarda en cada uno de los atributos los valores devueltos por el array.
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
	}

	public function conexion(){ // Método encargado de conectarnos a la base de datos.

        if($this->driver=="mysql" || $this->driver==null){

        	$con= new mysqli($this->host, $this->user, $this->pass, $this->database);

        	$con->query("SET NAMES '".$this->charset."'"); // Esta línea es para setear el utf8 y no nos coloque cualquier charset
        }

        return $con; // Devolvemos la conexión.

	}
    
    //Otros métodos para cargar Query Builders o ORM, etc.
    public function startFluent(){
         
         require_once "FluentPDO/FluentPDO.php";


         if($this->driver=="mysql" || $this->driver==null){

             $pdo = new PDO($this->driver.":dbname=".$this->database, $this->user, $this->pass);

             $fpdo = new FluentPDO($pdo);

         }

           return $fpdo;
    }	
	
}

?>