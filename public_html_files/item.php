<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->
    <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>
    <?php
    $query = query("SELECT * FROM productos WHERE producto_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    while($row = fetch_array($query)){
    ?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="../resources/<?php echo mostrar_imagen($row['producto_img']);?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $row['producto_titulo']?></a> </h4>
        <hr>
        <h4 class=""><?php echo "&#36;" . $row['producto_precio']?></h4>

   
          
        <p><?php echo $row['desc_corta']?></p>

   <hr>
    <form action="">
       
        <div class="form-group">
           <a href="../resources/carrito.php?add=<?php echo $row['producto_id'];?>" class="btn btn-primary" ><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></i> Cotizar </a>
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">
  
  
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Youtube
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Descripción
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <p><?php echo $row['producto_descripcion']?></p>
      </div>
    </div>
  </div>
 
</div>
  
  

</div>


</div><!--Row for Tab Panel-->




</div><!-- col-md-9 fin aqui -->

<?php } ?>


</div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
