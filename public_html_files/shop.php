<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
            <h1>Tienda</h1>
        </header>

        <hr>

   
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <?php llamar_productos_en_pagina_tienda(); ?>
            

        </div>
        <!-- /.row -->

        

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
