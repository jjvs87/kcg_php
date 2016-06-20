<?php agregar_subcategoria(); ?>
<h1 class="page-header">
  Subcategorias de producto

</h1>


<div class="col-md-4">

    <p class="class='bg bg-success"><?php mostrar_mensaje();  ?></p>

    
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Titulo</label>
            <input name="subcategoria" type="text" class="form-control">
        </div>
        
         <label for="product-title">Categoría Padre de producto</label>
         
        <div class="form-group">
        <select name="id_categorias" id="" class="form-control">
            <option value="">Selecciona Categoria</option>
           <?php mostrar_categorias_agregar_subcategorias(); ?>
        </select> </div>
        
        <div class="form-group">
            
            <input name="add_subcategoria" type="submit" class="btn btn-primary" value="Agregar Subategoria">
        </div>  
        
              
          


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Subcategoria</th>
            <th>Categoria</th>
            <th>Eliminar</th>
    <?php mostrar_subcategorias_admin();?>
        </tr>
            </thead>


    

        </table>

</div>

</form>

                











