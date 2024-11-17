<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

    /*====================== 
    EDITAR CATEGORIA
    ========================*/

    public $idNombre;
    public function ajaxEditarCategoria(){

        $item ="id";
        $valor = $this->idNombre;

        $respuesta = ControlCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
}

/*====================== 
EDITAR CATEGORIA
========================*/
if (isset($_POST["idNombre"])){

    $categoria = new AjaxCategorias();
    $categoria -> idNombre = $_POST["idNombre"];
    $categoria -> ajaxEditarCategoria();


}
