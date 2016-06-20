<?php agregar_marca(); ?>
<h1 class="page-header">
  Marcas de Fabricantes

</h1>


<div class="col-md-4">

    <p class="class='bg bg-success"><?php mostrar_mensaje();  ?></p>

    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="marcas-title">Titulo</label>
            <input name="nombre" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="marcas-text">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
        <label for="imagen_marca	">Imagen </label>
        <input type="file" name="file">
    </div>

        <div class="form-group">

            <input name="add_marca" type="submit" class="btn btn-primary" value="Agregar Marca">
        </div>


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Imagen</th>
        </tr>
            </thead>


    <tbody>
        <?php mostrar_marcas_admin(); ?>
    </tbody>

        </table>

</div>
