<?php

require_once "conexion.php";

class ModeloCategorias{

    /* ========================================
    CREAR CATEGORIAS
    =========================================*/

    static public function mdlingresarCategorias($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");
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

    /* ========================================
    MOSTRAR CATEGORIAS
    =========================================*/

    static public function mdlMostrarCategorias($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt-> fetchAll();

        }

        $stmt-> close();
        $stmt= null;

    }
}
