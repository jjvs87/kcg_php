<?php agregar_producto(); ?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Agregar producto

</h1>
</div>



<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Nombre de producto </label>
        <input type="text" name="producto_titulo" class="form-control">

    </div>


    <div class="form-group">
           <label for="product-title">Descripción corta</label>
      <textarea  name="desc_corta"  cols="30" rows="3" class="form-control mytextarea"></textarea>
    </div>

    <div class="form-group">
           <label for="product-title">Descripción del producto</label>
      <textarea name="producto_descripcion"  cols="30" rows="10" class="form-control mytextarea" ></textarea>
    </div>



</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">


     <div class="form-group">
       <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publicar">
       <input class="btn btn-danger btn-lg" type='Submit' value=Cancelar name=Accion id=Accion OnClick="index.php?add_product">

    </div>


     <!-- Product Categories-->
     <div class="form-group">

         <label for="product-price">Precio</label>
         <input type="number" name="producto_precio" class="form-control" name="producto_precio" size="60">

     </div>
    <div class="form-group">
         <label for="product-title">Categoria de producto</label>

        <select name="producto_categoria_id" id="" class="form-control">
            <option value="">Selecciona Categoria</option>
           <?php mostrar_categorias_agregar_producto(); ?>
        </select>
</div>


<div class="form-group">
     <label for="product-title">Subcategoria de producto</label>

    <select name="subcat_id" id="" class="form-control">
        <option value="">Selecciona Subcategoria</option>
       <?php mostrar_subcategorias_agregar_producto(); ?>
    </select>
</div>

<div class="form-group">
     <label for="product-title">Fabricante</label>

    <select name="marca_producto" id="" class="form-control">
        <option value="">Selecciona Fabricante</option>
       <?php mostrar_marca_producto(); ?>
    </select>
</div>


    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Producto Cantidad</label>
         <input class="form-control" type="number" name="producto_cantidad">
    </div>


<!-- Product Tags -->


    <!-- <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div> -->

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Imagen de Producto</label>
        <input type="file" name="file">

    </div>

</aside><!--SIDEBAR-->

</form>
