<?php require_once("../../resources/config.php");

    if(isset($_GET['delete_slide_id'])){

   // $query_find_image = query("SELECT slides_image FROM slides WHERE slides_id = " . escape_string($_GET['delete_slide_id']) . "LIMIT 1");
   // confirm($query_find_image);

   // $row = fetch_array($query_find_image);
   // $target_path = UPLOAD_DIRECTORY . DS . $row['slides_image']; 	

   // unlink($target_path);

   $query = query("DELETE FROM slides WHERE slides_id = " . escape_string($_GET['delete_slide_id']) . " ");
   confirm($query);


   mensaje_alerta("Slide Eliminado");
   redirect("index.php?slides");


    }else {

    redirect("index.php?slides");

    }



 ?>