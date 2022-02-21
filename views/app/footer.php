        <!-- JavaScript -->

        <!-- Plugins -->
        <!-- jQuery -->
        <script src="<?php echo RUTA; ?>assets/jquery//jquery-3.3.1.min.js"></script>
        <!-- Boostrap -->
        <script src="<?php echo RUTA; ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- Pooper -->
        <script src="<?php echo RUTA; ?>assets/popper/popper.min.js"></script>
        <!-- Datatable -->
        <script src="<?php echo RUTA; ?>assets/datatables/datatables.min.js"></script>
        <script src="<?php echo RUTA; ?>assets/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo RUTA; ?>assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="<?php echo RUTA; ?>assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="<?php echo RUTA; ?>assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="<?php echo RUTA; ?>assets/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
        <script src="<?php echo RUTA; ?>assets/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

        <!-- SweetAelr2 -->
        <script src="<?php echo RUTA; ?>assets/js/plugins/sweetAlert2.js"></script>

        <!-- App -->
        <script src="<?php echo RUTA; ?>assets/js/app/app.js"></script>
        <!-- Script por Modelo -->
        <?php 
        if( isset( $_GET['url']) ){
            $script = explode('/', $_GET['url']);
            $script = $script[0];
            $direccion = RUTA . 'assets/js/app/' . $script . '.js';
             ?>
                <script src="<?php echo $direccion; ?>"></script>
            <?php }?>
        <footer class="main-footer bg-dark text-white">
            <div class="float-right d-none d-sm-block">
                <b>Versión</b> 1.0.1
            </div>
            <strong>Copyright &copy; 2017-2022 <a href="https://emmkall.github.io/">EmmKall</a>.</strong> All rights reserved - Todos los derechos reservados.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

    </div>

</body>
</html>