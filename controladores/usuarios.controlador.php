<?php
class ControladorUsuarios
{

    /* INGRESO DE USUARIO */

    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["ingUsuario"])) {
            if (
                preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[-a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {
                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                // Consultar el usuario en la base de datos
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                // Verificar si el usuario existe y si la contraseña es correcta
                if ($respuesta["usuario"] == $_POST["ingUsuario"]) {

                    // Verificar la contraseña usando crypt
                    $passwordIngresado = $_POST["ingPassword"];
                    $passwordAlmacenado = $respuesta["password"];

                    if (crypt($passwordIngresado, $passwordAlmacenado) == $passwordAlmacenado) {

                        if ($respuesta["estado"] == 1) {
                            // Contraseña correcta
                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["usuario"] = $respuesta["usuario"];
                            $_SESSION["foto"] = $respuesta["foto"];
                            $_SESSION["perfil"] = $respuesta["perfil"];

                            //REGISTRAR ULTIMO LOGIN

                            date_default_timezone_set('America/Bogota');

                            $fecha = date('Y-m-d');
                            $hora = date('H:i:s');

                            $fechaActual = $fecha . ' ' . $hora;

                            $item1 = "ultimo_login";
                            $valor1 = $fechaActual;

                            $item2 = "id";
                            $valor2 = $respuesta["id"];

                            $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                            if ($ultimoLogin == "ok") {

                                echo '<script>
                                 window.location = "inicio";
                                    </script>';
                            }
                        } else {
                            echo '<br><div class="alert alert-danger">Usuario esta inactivo.</div>';
                        }
                    } else {
                        echo '<br><div class="alert alert-danger">Usuario o contraseña incorrecta. Vuelve a intentar.</div>';
                    }
                } else {
                    echo '<br><div class="alert alert-danger">Usuario o contraseña incorrecta. Vuelve a intentar.</div>';
                }
            }
        }
    }


    /* REGISTRO DE USUARIO */

    static public function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
            ) {

                //VALIDAR IMAGEN

                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])&& !empty($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    //CREAR DORTECTORIO PARA GUARDAR FOTO DE USUARIO

                    $directorio = "vistas/img/usuarios/" . $_POST["nuevoUsuario"];

                    mkdir($directorio, 0755);

                    //metodos para guardar la imagen segun sea jpg o png                    

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                        //guardar imagen 

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {

                        //guardar imagen 

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                // Generar un salt aleatorio con el prefijo $2y$ para Blowfish
                $salt = '$2y$10$' . substr(str_replace('+', '.', base64_encode(random_bytes(22))), 0, 22);

                $esconder = crypt($_POST["nuevoPassword"], $salt);

                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $esconder,

                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
                }
            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
            }
        }
    }


    /*  MOSTRAR USUARIO */

    static public function ctrMostrarUsuarios($item, $valor)
    {

        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    //EDITAR USUARIOS

    public function ctrEditarUsuario()
    {
        if (isset($_POST["editarUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                // Inicializa la ruta de la imagen con el valor de 'fotoActual'
                $ruta = $_POST["fotoActual"];

                // Verifica si se ha subido una nueva foto
                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    // Intenta obtener el tamaño de la imagen y maneja errores si no es una imagen válida
                    $imagenInfo = @getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    if ($imagenInfo !== false) {
                        list($ancho, $alto) = $imagenInfo;

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        // Crea el directorio si no existe
                        $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];

                        // Si ya existe una foto anterior, elimínala
                        if (!empty($_POST["fotoActual"]) && file_exists($_POST["fotoActual"])) {
                            unlink($_POST["fotoActual"]);
                        }

                        // Crea el directorio si no existe
                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0755, true);
                        }

                        // Guarda la imagen en formato JPEG o PNG
                        $aleatorio = mt_rand(100, 999);
                        if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                            $ruta = "$directorio/$aleatorio.jpg";
                            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                        } elseif ($_FILES["editarFoto"]["type"] == "image/png") {
                            $ruta = "$directorio/$aleatorio.png";
                            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }
                    } else {
                        echo '<script>alert("Error: El archivo cargado no es una imagen válida.");</script>';
                    }
                }

                $tabla = "usuarios";

                // Validación de la contraseña
                if (!empty($_POST["editarPassword"])) {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        $salt = '$2y$10$' . substr(str_replace('+', '.', base64_encode(random_bytes(22))), 0, 22);
                        $esconder = crypt($_POST["editarPassword"], $salt);
                    } else {
                        echo '<script>
                        swal({
                            type: "error",
                            title: "¡La contraseña no puede estar vacía o tener caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if(result.value) {
                                window.location = "usuarios";
                            }
                        });
                    </script>';
                        return;
                    }
                } else {
                    $esconder = $_POST["passwordActual"];
                }

                $datos = array(
                    "nombre" => $_POST["editarNombre"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" => $esconder,
                    "perfil" => $_POST["editarPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "¡El usuario ha sido actualizado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if(result.value) {
                            window.location = "usuarios";
                        }
                    });
                </script>';
                }
            } else {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if(result.value) {
                        window.location = "usuarios";
                    }
                });
            </script>';
            }
        }
    }
}
