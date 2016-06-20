<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container-fluid">
        
        <div class="row carousel-holder">

                    <div class="col-md-12" id="slider">
                        <?php include(TEMPLATE_FRONT . DS . "slider.php"); ?>
                    </div>

                </div>
    </div>
    

    <div class="container" id="videos_index">
        
            <?php include(TEMPLATE_FRONT . DS . "youtube_inicio.php") ?>
        

        </div> <!-- DIV CONTAINER VIDEOS INDEX -->

        <div class="container" id="imagenes_index">
            <?php include (TEMPLATE_FRONT . DS . "imagenes_index.php") ?>
        </div>

    <div class="container">
        <div class="row">
        
       
             <?php include(TEMPLATE_FRONT . DS . "marcas.php") ?>

        </div>
           
            </div>
     


    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    
<!--    
                <div class="row">
                 
                    <?php llamar_productos(); ?>
                </div>
                  -->