<?php include_once('views/app/header.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-dark">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <h1 class="text-center text-white">Productos</h1>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card text-dark">
            <div class="card-header">
            <h3 class="card-title">Productos</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <div class="card-body row">

                <div class="col-12 bg-secondary p-2">
                <h4 class="text-center my-2 border-bottom border-3 border-primary pb-2">Agregar/Editar Productos</h3>
                    <form action="#" class="row" mehtod="POST" id="form">

                        <div class="row col-12 col-md-7 form-group">
                            <label for="nombre" class="col-12 col-md-2 form-label">Producto:</label>
                            <input type="text" name="nombre" id="nombre" class="col-12 col-md-10 form-control text-center" value="" placeholder="Nombre de producto" required>
                        </div>

                        <div class="row col-12 col-md-5 form-group">
                            <label for="precio" class="col-12 col-md-2 form-label">Precio:</label>
                            <input type="number" name="precio" id="precio" class="col-12 col-md-10 form-control text-center" value="" placeholder="Precio del producto" required>
                        </div>
                        
                        <div class="col-12 form-group d-flex justify-content-center py-1">
                            <input type="submit" value="Enviar" id="btn-form" class="btn btn-success text-center text-uppercase">
                        </div>

                    </form>
                </div>


                <div class="col-12">
                <h3 class="text-center my-2 border-bottom border-3 border-primary pb-2">Lista de Productos</h3>
                <?php  if( sizeof( $this->data ) > 0 ){ ?>
                    <table id="table" class="table">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th scode="1">Nombre</th>
                                <th scode="1">Precio</th>
                                <th scode="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($this->data as $data ){?>
                                <tr>
                                    <td scode="1"><?php echo $data->nombre; ?></td>
                                    <td scode="1"><?php echo $data->precio; ?></td>
                                    <td scode="2">
                                        <a href="#" data-id="<?php echo $data->id; ?>" class="text-uppercase btn btn-success editar">Editar</a>
                                        <a href="#" data-id="<?php echo $data->id; ?>" class="text-uppercase btn btn-danger eliminar">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="bg-dark text-white text-center">
                            <tr>
                                <th scode="1">Nombre</th>
                                <th scode="1">Precio</th>
                                <th scode="2">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php } else { ?>
                        <h4 class="text-center p-2 bg-warning text-white">Sin registros aún</h4>
                <?php } ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

<?php include_once('views/app/footer.php'); ?>