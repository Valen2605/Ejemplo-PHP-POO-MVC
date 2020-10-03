<?php
class ControladorBase{
 
    public function __construct() {

        require_once 'Conectar.php';

        require_once 'EntidadBase.php'; /* require_once es para incluir archivo php externo. En caso de que falle,
                                           la aplicación se detiene; a diferencia del include que la 
                                           aplicación sigue funcionando. */
        require_once 'ModeloBase.php';
         
        //Incluir todos los modelos que están en la carpeta model
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
     
    //Plugins y funcionalidades
     
/*
* Este método lo que hace es recibir los datos del controlador en forma de array
* los recorre y crea una variable dinámica con el indice asociativo y le da el
* valor que contiene dicha posición del array, luego carga los helpers para las
* vistas y carga la vista que le llega como parámetro. En resumen un método para
* renderizar vistas.
*/
    public function view($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor;
        }
         
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
     
        require_once 'view/'.$vista.'View.php';
    }
     
    /** Método para redireccionar al cual se le va a pasar el nombre de la acción del controlador */
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
     
    //Métodos para los controladores
 
}
?>