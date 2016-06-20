
                


        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   Todos los pedidos

</h1>
<h4 class="bg-success"><?php mostrar_mensaje(); ?></h4>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>id</th>
           <th>Amount</th>
           <th>Transaction</th>
           <th>Currency</th>
           <th>Status</th>
           <th>Acciones</th>
           
      </tr>
    </thead>
    <tbody>
        <?php 
        mostrar_ordenes();
         ?>
        

    </tbody>
</table>
</div>











            
