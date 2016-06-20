<?php require_once("../../config.php"); 

    if(isset($_GET['id'])){

$query = query("DELETE FROM productos WHERE producto_id = " . escape_string($_GET['id']) . " ");
confirm($query);

mensaje_alerta("Producto eliminado");
redirect("../../../public_html_files/admin/index.php?products");


    }else {

redirect("../../../public_html_files/admin/index.php?products");

    }



 ?>