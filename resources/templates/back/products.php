<?php agregar_producto(); ?>

<h1 class="page-header">
   Productos

</h1>

<h4 class="bg-success"><?php mostrar_mensaje(); ?></h4>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Titulo</th>
           <th>Categoria</th>
           <th>Subcategoria</th>
           <th>Precio</th>
           <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>

      <?php llamar_productos_admin(); ?>

  </tbody>
</table>
