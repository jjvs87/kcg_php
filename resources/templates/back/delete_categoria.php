<?php require_once("../../config.php"); 

    if(isset($_GET['id'])){

$query = query("DELETE FROM categorias WHERE id_cat = " . escape_string($_GET['id']) . " ");
confirm($query);

mensaje_alerta("Categoria Eliminada");
redirect("../../../public_html_files/admin/index.php?categories");


    }else {

redirect("../../../public_html_files/admin/index.php?categories");

    }



 ?>