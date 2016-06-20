<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

       

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Productos</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php llamar_productos_en_subcategorias() ?>
            

        </div>
        <!-- /.row -->

        

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
