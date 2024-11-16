<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelo/categorias.modelo.php";

class AjaxCategorias{

    /*====================== 
    EDITAR CATEGORIA
    ========================*/

    public $idNombre;
    public function ajaxEditarCategoria(){

        $item ="id";
        $valor = $this->idNombre;

        $respuesta = ControlCategorias::crtMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
}

/*====================== 
EDITAR CATEGORIA
========================*/
if (isset($_POST["idNombre"])){

    $categoria = new AjaxCategoria();
    $categoria -> idNombre = $_POST["idNombre"];
    $categoria -> ajaxEditarCategoria();


}
