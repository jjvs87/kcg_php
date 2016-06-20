<?php require_once("../../resources/config.php"); 

    if(isset($_GET['delete_order_id'])){

$query = query("DELETE FROM reportes WHERE report_id = " . escape_string($_GET['delete_order_id']) . " ");
confirm($query);

mensaje_alerta("Pedido eliminado");
redirect("index.php?reports");


    }else {

redirect("index.php?reports");

    }



 ?>