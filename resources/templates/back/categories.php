<?php agregar_categoria(); ?>
<h1 class="page-header">
  Categorias de producto

</h1>


<div class="col-md-4">

    <p class="class='bg bg-success"><?php mostrar_mensaje();  ?></p>

    
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Titulo</label>
            <input name="cat_titulo" type="text" class="form-control">
        </div>

        <div class="form-group">
            
            <input name="add_category" type="submit" class="btn btn-primary" value="Agregar Categoria">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
        <?php mostrar_categorias_admin(); ?>
    </tbody>

        </table>

</div>



                











