<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar clientes
            <small>control de clientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar clientes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

                    Agregar cliente

                </button>

            </div>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento ID</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Fecha nacimiento</th>
                            <th>Total compras</th>
                            <th>Ultima Compra</th>
                            <th>Ingreso al sistema</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Kevin Vega</td>
                            <td>1000326964</td>
                            <td>kevin@gmail.com</td>
                            <td>321 268 6159</td>
                            <td>cra 110B Bis #61-18</td>
                            <td>2002-09-09</td>
                            <td>35</td>
                            <td>2024-09-09 12:09:23</td>
                            <td>2022-12-24 12:09:54</td>
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
MODAL AGREGAR CLIENTE
========================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="post">
                <!-- ====================== 
                CABEZA DEL MODAL
                ========================-->
                <div class="modal-header" style="background:#007bff; color:aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar cliente</h4>
                </div>

                <!-- ====================== 
                CUERPO DEL MODAL
                ========================-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- Entrada para el Nombre -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre del cliente" required>
                            </div>
                        </div>

                        <!-- Entrada para el Documento -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar numero de documento" required>
                            </div>
                        </div>


                        <!-- Entrada para el Email -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
                            </div>
                        </div>

                        <!-- Entrada para el Telfono -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar telefono"
                                    data-inputmask="'mask': '(999) 999-9999'" data-mask required>
                            </div>
                        </div>

                        <!-- Entrada para la direccion -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar direccion"
                                    required>
                            </div>
                        </div>

                        <!-- Entrada para la fecha de naciemiento -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar la fecha de nacimiento"
                                    data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            </div>
                        </div>

                    </div>

                </div>
        </div>
        <!-- ====================== 
                PIE DEL MODAL
                ========================-->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>

        <?php
        $crearCategoria = new ControlCategorias();
        $crearCategoria->ctrCrearCategoria();

        ?>

        </form>

    </div>

</div>

</div>

<!-- ====================== 
MODAL EDITAR CATEGORIA
========================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="post">
                <!-- ====================== 
                CABEZA DEL MODAL
                ========================-->
                <div class="modal-header" style="background:#007bff; color:aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar categoria</h4>
                </div>

                <!-- ====================== 
                CUERPO DEL MODAL
                ========================-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- Entrada para el Nombre -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
                            </div>
                        </div>

                    </div>

                </div>
        </div>
        <!-- ====================== 
                PIE DEL MODAL
                ========================-->
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        <!--<?php

            $crearCategoria = new ControlCategorias();
            $crearCategoria->ctrCrearCategoria();

            ?> -->

        </form>

    </div>

</div>

</div>