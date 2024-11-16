/*====================== 
EDITAR CATEGORIA
========================*/

$(".btnEditarCategoria").click(function(){

    var idNombre = $(this).attr("idNombre");
    var datos = new FormData();
    datos.append("idNombre", idNombre);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        Cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){

            $("#editarCategoria").val(respuesta["nombre"]);
            
        }

    })


})
