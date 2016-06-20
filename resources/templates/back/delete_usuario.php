<?php require_once("../../config.php"); 

    if(isset($_GET['id'])){

$query = query("DELETE FROM usuarios WHERE id_usuario = " . escape_string($_GET['id']) . " ");
confirm($query);

mensaje_alerta("Usuario eliminado");
redirect("../../../public_html_files/admin/index.php?users");


    }else {

redirect("../../../public_html_files/admin/index.php?users");

    }



 ?>