<?php require_once("../../resources/config.php") ?>
<?php include(TEMPLATE_BACK . "/header.php") ?>
        
<?php 

    if(!isset($_SESSION['username'])){
        redirect("../../public_html_files/index.php");
    }


 ?>
        <div id="page-wrapper">

            <div class="container-fluid">

               

                 <?php 

                 if($_SERVER['REQUEST_URI'] == "/kcg_php/public_html_files/admin/" || $_SERVER['REQUEST_URI'] == "/kcg_php/public_html_files/admin/index.php")
                 {

                    include(TEMPLATE_BACK . "/admin_contenido.php");
                 }

                if(isset($_GET['orders'])){

                    include(TEMPLATE_BACK . "/orders.php");
                }
                if(isset($_GET['marcas'])){

                    include(TEMPLATE_BACK . "/marcas.php");
                }

                if(isset($_GET['categories'])){

                    include(TEMPLATE_BACK . "/categories.php");
                }
                if(isset($_GET['subcategorias'])){

                    include(TEMPLATE_BACK . "/subcategorias.php");
                }
                if(isset($_GET['products'])){

                    include(TEMPLATE_BACK . "/products.php");
                }
                if(isset($_GET['add_product'])){

                    include(TEMPLATE_BACK . "/add_product.php");
                }
                if(isset($_GET['edit_product'])){

                    include(TEMPLATE_BACK . "/edit_product.php");
                }


                if(isset($_GET['users'])){

                    include(TEMPLATE_BACK . "/users.php");
                }

                if(isset($_GET['add_user'])){

                    include(TEMPLATE_BACK . "/add_user.php");
                }

                if(isset($_GET['reports'])){

                    include(TEMPLATE_BACK . "/reports.php");
                }
                if(isset($_GET['slides'])){

                    include(TEMPLATE_BACK . "/slides.php");
                }
                if(isset($_GET['delete_slide_id'])){

                    include(TEMPLATE_BACK . "/delete_slide.php");
                }
                if(isset($_GET['delete_order_id'])){

                    include(TEMPLATE_BACK . "/delete_orders.php");
                }
                if(isset($_GET['add_video_index1'])){

                    include(TEMPLATE_BACK . "/add_video_index1.php");
                }

                  ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php") ?>
    