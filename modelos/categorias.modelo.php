<?php

require_once "conexion.php";

class ModeloCategorias{

    /* ========================================
    CREAR CATEGORIAS
    =========================================*/

    static public function mdlingresarCategorias($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");
        $stmt->bindParam(":nombre", $datos, PDO::PARAM_STR);
        if($stmt->execute()){

            return "Ok";

        }else{

            return "error";

        }

        $stmt ->close();
        $stmt = null;
    }
}
