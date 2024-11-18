<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar productos
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar productos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

                    Agregar producto

                </button>

            </div>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>
                            <td><img src="vistas\img\productos\default\anonymous.png" class="img-thumbnail" width="40px"></td>
                            <td>001</td>
                            <td>lampara de ancho de 3.5 m</td>
                            <td>Lamparas</td>
                            <td>40</td>
                            <td>$ 15.000</td>
                            <td>$ 24.000</td>
                            <td>2024-12-11 12:05:32</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr>

                            <td>1</td>
                            <td><img src="vistas\img\productos\default\anonymous.png" class="img-thumbnail" width="40px"></td>
                            <td>001</td>
                            <td>lampara de ancho de 3.5 m</td>
                            <td>Lamparas</td>
                            <td>40</td>
                            <td>$ 15.000</td>
                            <td>$ 24.000</td>
                            <td>2024-12-11 12:05:32</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr>

                            <td>1</td>
                            <td><img src="vistas\img\productos\default\anonymous.png" class="img-thumbnail" width="40px"></td>
                            <td>001</td>
                            <td>lampara de ancho de 3.5 m</td>
                            <td>Lamparas</td>
                            <td>40</td>
                            <td>$ 15.000</td>
                            <td>$ 24.000</td>
                            <td>2024-12-11 12:05:32</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>

                    </tbody>


                </table>

            </div>

        </div>

    </section>

</div>
<!-- ====================== 
MODAL AGREGAR PRODUCTO
========================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- ====================== 
                CABEZA DEL MODAL
                ========================-->
                <div class="modal-header" style="background:#007bff; color:aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar producto</h4>
                </div>

                <!-- ====================== 
                CUERPO DEL MODAL
                ========================-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- Entrada para el código -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar código" required>
                            </div>
                        </div>

                        <!-- Entrada para la Descripción -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
                            </div>
                        </div>

                        <!-- Entrada para seleccionar la categoria -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <select class="form-control input-lg" name="nuevaCategoria">

                                    <option value="">seleccionar categoria</option>
                                    <option value="Luces">Luces</option>
                                    <option value="taladros">taladros</option>
                                    <option value="pinturas">pinturas</option>

                                </select>
                            </div>
                        </div>

                        <!-- Entrada para stock -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Ingresar stock" required>
                            </div>
                        </div>

                        <!-- Entrada para precio de compra -->
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" min="0" placeholder="precio de compra" required>
                                </div>
                            </div>
                            <!-- Entrada para precio de venta -->
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" min="0" placeholder="precio de venta" required>
                                </div>
                                <br>

                                <!-- checkbox para procentaje -->
                                <div class="col-xs-6">

                                    <div class="form-group">

                                        <label>

                                            <input type="checkbox" class="minimal porcentaje" checked>
                                            Utilizar porcentaje
                                        </label>
                                    </div>
                                </div>

                                <!-- entrada para procentaje -->

                                <div class="col-xs-6" style="padding:0">

                                    <div class="input-group">

                                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                    </div>

                                </div>


                            </div>
                        </div>

                        <!-- Entrada para subir imagen -->
                        <div class="form-group">

                            <div class="panel">SUBIR IMAGEN</div>
                            <input type="file" id="nuevaImagen" name="nuevaImagen">
                            <p class="help-block">Pseo Max (200 MB)</p>
                            <img src="vistas\img\productos\default\anonymous.png" class="img-thumbnail" width="100px" height="100px">


                        </div>

                    </div>
                </div>
                <!-- ====================== 
                PIE DEL MODAL
                ========================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar producto</button>
                </div>

            </form>

        </div>

    </div>

</div>