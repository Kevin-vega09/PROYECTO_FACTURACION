<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar categorias
            <small>control de susuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar categorias</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                    Agregar categoria

                </button>

            </div>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>categoria</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $categorias = ControlCategorias::ctrMostrarCategorias($item, $valor);

                        foreach ($categorias as $key => $value) {

                            echo ' <tr>

                            <td>' . ($key + 1) . '</td>

                            <td class="text-uppercase">' . $value["nombre"] . '</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarCategoria" idNombre="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>

                        </tr>';
                        }

                        ?>

                    </tbody>


                </table>

            </div>

        </div>

    </section>

</div>
<!-- ====================== 
MODAL AGREGAR CATEGORIA
========================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <form role="form" method="post">
                <!-- ====================== 
                CABEZA DEL MODAL
                ========================-->
                <div class="modal-header" style="background:#007bff; color:aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar categoria</h4>
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
                                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" required>
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
            <button type="submit" class="btn btn-primary">Guardar Categoria</button>
        </div>

        </form>

        <?php
        $crearCategoria = new ControlCategorias();
        $crearCategoria->ctrCrearCategoria();

        ?>

    </div>

</div>
<<<<<<< HEAD
=======

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

            //$crearCategoria=new ControlCategorias();
            //$crearCategoria->ctrCrearCategoria();

            ?> -->

        </form>

    </div>

</div>

</div>
>>>>>>> 3381af85e0d1ed7cf173d4335fabf004008a1d2b
