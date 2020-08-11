<?php

/** Esta clase contiene una serie de pequeños helpers(pequeños métodos que
 *  nos ayuden en pequeñas tareas dentro de las vistas). */
class AyudaVistas{
    
    /** Este método es para mostrar la url*/
    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        $urlString="index.php?controller=".$controlador."&action=".$accion;
        return $urlString;
    }
     
    //Helpers para las vistas
}
?>