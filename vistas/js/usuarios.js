/*=====================================
=           subir foto de usuario     =
======================================*/

$(".nuevaFoto").change(function () {
  var imagen = this.files[0];

  //console.log("imagem", imagen);

  /*=====================================
    =     validar formato de la imagen     =
     ======================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaFoto").val("");

    swal({
      title: "error al subir la imagen",
      text: "¡La imagen debe estar en formato PNG o JPG!",
      type: "error",
      confirmButtonText: "Cerrar",
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaFoto").val("");

    swal({
      title: "error al subir la imagen",
      text: "¡La imagen no debe pesar mas de 2 MB!",
      type: "error",
      confirmButtonText: "Cerrar",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*=====================================
    =     Editar Usuario     =
     ======================================*/

$(document).on("click", ".btnEditarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");

  console.log("ID Usuario:", idUsuario);

  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#fotoActual").val(respuesta["foto"]);

      $("#passwordActual").val(respuesta["password"]);

      if (respuesta["foto"] != "") {
        $(".previsualizar").attr("src", respuesta["foto"]);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    },
  });
});

/*=====================================
      =     Editar Usuario     =
      ======================================*/

$(document).on("click", ".btnActivar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {},
  });

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoUsuario", 0);
  }
});

//REVISAR SI EL USUARIO YA ESTA REGISTRADO

$("#nuevoUsuario").change(function () {
  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      var existeUsuario = JSON.parse(respuesta); // Convertimos la respuesta en JSON

      if (existeUsuario) {
        $("#nuevoUsuario")
          .parent()
          .after(
            '<div class="alert alert-warning">Este usuario ya existe, intenta con otro</div>'
          );
        $("#nuevoUsuario").val("");
      }
    },
  });
});

//ELIMINAR USUARIO

$(document).on("click", ".btnEliminarUsuario", function () {

  idUsuario = $(this).attr("idUsuario");
  fotoUsuario = $(this).attr("fotoUsuario");
  usuario = $(this).attr("usuario");

swal ({

  title: '¿Está seguro de borrar el usuario?',
  text: "¡Si no lo está puede cancelar la acción!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Cancelar',
  confirmButtonText: 'si, borrar usuario!'

}).then((result)=>{

  if(result.value){

    window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
  }

})

})
