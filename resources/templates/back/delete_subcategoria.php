<?php require_once("../../config.php"); 

    if(isset($_GET['id'])){

$query = query("DELETE FROM subcategoria WHERE id_subcategoria = " . escape_string($_GET['id']) . " ");
confirm($query);

mensaje_alerta("Subcategoria Eliminada");
redirect("../../../public_html_files/admin/index.php?subcategorias");


    }else {

redirect("../../../public_html_files/admin/index.php?subcategorias");

    }



 ?>