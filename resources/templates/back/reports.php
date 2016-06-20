<?php agregar_producto(); ?>

<h1 class="page-header">
   Reportes

</h1>

<h4 class="bg-success"><?php mostrar_mensaje(); ?></h4> 
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Producto ID</th>
           <th>Pedido ID</th>
           <th>Precio</th>
           <th>Titulo producto</th>
           <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>

      
      <?php mostrar_reportes(); ?>


  </tbody>
</table>











                
                 

