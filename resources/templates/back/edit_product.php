<?php

if(isset($_GET['id'])){


  $query = query("SELECT * FROM productos WHERE producto_id = " . escape_string($_GET['id']) . " ");
  confirm($query);

    while ($row = fetch_array($query)) {

    $producto_titulo        = escape_string($row['producto_titulo']);
    $producto_categoria_id  = escape_string($row['producto_categoria_id']);
    $subcat_id 						  = escape_string($row['subcat_id']);
    $marca_producto              = escape_string($row['marca_producto']);
    $producto_precio        = escape_string($row['producto_precio']);
    $producto_descripcion   = escape_string($row['producto_descripcion']);
    $producto_cantidad      = escape_string($row['producto_cantidad']);
    $desc_corta             = escape_string($row['desc_corta']);
    $producto_img           = escape_string($row['producto_img']);
    $producto_img           = mostrar_imagen($row['producto_img']);

    }

    actualizar_producto();
}



 ?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Editar producto

</h1>
</div>



<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Nombre de producto </label>
        <input type="text" name="producto_titulo" class="form-control" value="<?php echo $producto_titulo; ?>" >

    </div>


    <div class="form-group">
           <label for="product-title">Descripcion del producto</label>
      <textarea name="producto_descripcion" id="" cols="30" rows="10" class="form-control mytextarea"><?php echo $producto_descripcion; ?></textarea>
    </div>


    <div class="form-group">
           <label for="product-title">Descripcion corta</label>
      <textarea name="desc_corta" id="" cols="30" rows="3" class="form-control mytextarea"><?php echo $desc_corta; ?></textarea>
    </div>



</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">


     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Actualizar">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Categoria de producto</label>
        <select name="producto_categoria_id" id="" class="form-control">
            <option value="<?php echo $producto_categoria_id; ?>"><?php echo mostrar_titulo_categoria_producto($producto_categoria_id)?></option>
           <?php mostrar_categorias_agregar_producto(); ?>
        </select>
      </div>

      <div class="form-group">
           <label for="product-title">Subcategoria de producto</label>
          <select name="subcat_id" id="" class="form-control">
              <option value="<?php echo $subcat_id; ?>"><?php echo mostrar_subcategoria_producto($subcat_id)?></option>
             <?php mostrar_subcategorias_agregar_producto(); ?>
          </select>
        </div>


         <div class="form-group">
           <label for="marca-title">Fabricante/Marca</label>
          <select name="marca_producto" id="" class="form-control">
              <option value="<?php echo $marca_producto; ?>"><?php echo mostrar_marca_producto($marca_producto)?></option>
             <?php mostrar_marca_producto(); ?>
          </select>
        </div>


<div class="form-group ">
    <label for="product-price">Precio</label>
    <input type="number" name="producto_precio" class="form-control" name="producto_precio" size="60" value="<?php echo $producto_precio; ?>">
</div>


    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Producto Cantidad</label>
         <input class="form-control" type="number" name="producto_cantidad" value="<?php echo $producto_cantidad; ?>">
    </div>


<!-- Product Tags -->


    <!-- <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div> -->

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file"> <br>
        <img width='300' src="../../resources/<?php echo $producto_img; ?>" alt="">
    </div>



</aside><!--SIDEBAR-->



</form>
