<?php require_once("../../config.php"); 

    if(isset($_GET['id'])){

$query = query("DELETE FROM marcas WHERE id_marca = " . escape_string($_GET['id']) . " ");
confirm($query);

mensaje_alerta("Marca Eliminada");
redirect("../../../public_html_files/admin/index.php?marcas");


    }else {

redirect("../../../public_html_files/admin/index.php?marcas");

    }



 ?>