<?php

class ControlCategorias
{
    /* ========================================
    CREAR CATEGORIAS
    =========================================*/

    static public function ctrCrearCategoria()
    {

        if (isset($_POST["nuevaCategoria"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {

                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];
                $respuesta =  ModeloCategorias::mdlingresarCategorias($tabla, $datos);
                if ($respuesta == "Ok") {

                    echo '<script>

                    swal({
                        type: "success",
                        title: "¡La Categoria ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result) => {
                                if(result.value) {

                                window.location = "categorias";
                           }
                        })
                </script>';
                }
            } else {

                echo '<script>

                    swal({
                        type: "error",
                        title: "¡La Categoria no puede ir vacia o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result) => {
                           if(result.value) {

                           window.location = "categorias";
                           }
                        })
                </script>';
            }
        }
    }

    /* ========================================
    MOSTRAR CATEGORIAS
    =========================================*/

    static public function ctrMostrarCategorias($item, $valor)
    {

        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;
    }

    /* ========================================
    EDITAR CATEGORIAS
    =========================================*/
    static public function ctrEditarCategoria()
    {

        if (isset($_POST["editarCategoria"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])) {

                $tabla = "categorias";
                $datos = array(
                    "nombre" => $_POST["editarCategoria"],
                    "id" => $_POST["idCategoria"]
                );

                $respuesta =  ModeloCategorias::mdlEditarCategorias($tabla, $datos);

                if ($respuesta == "Ok") {

                    echo '<script>

                    swal({
                        type: "success",
                        title: "¡La Categoria ha sido actualizada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result) => {
                        if (result.value) {

						window.location = "categorias";

						}
                        })
                </script>';
                }
            } else {

                echo '<script>

                    swal({
                        type: "error",
                        title: "¡La Categoria no puede ir vacia o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                        }).then((result) => {
                           if(result.value) {

                           window.location = "categorias";
                           }
                        })
                </script>';
            }
        }
    }
}
