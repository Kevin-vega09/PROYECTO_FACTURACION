/* ====================== 
MODAL AGREGAR CATEGORIA
========================*/
<<<<<<< HEAD

$(".btnEditarCategoria").click(function(){

    var idNombre = $(this).attr("idNombre");

    var datos = new FormData();
    datos.append("idNombre", idNombre);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $("#editarCategoria").val(respuesta["nombre"]);
            console.log("respuesta", respuesta);

        }


    })
})
=======
$(document).on("click", ".btnEditarCategoria", function () {
  console.log("Botón clickeado");
  var idNombre = $(this).attr("idNombre");
  var datos = new FormData();
  datos.append("idNombre", idNombre);
  $.ajax({
    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idCategoria").val(respuesta["id"]);
      $("#editarCategoria").val(respuesta["nombre"]);
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud:", error);
      console.error("Detalles:", xhr.responseText);
    },
  });
});
>>>>>>> 3381af85e0d1ed7cf173d4335fabf004008a1d2b
