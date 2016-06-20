<?php require_once("config.php"); ?>

<?php 

  //Funcion para agregar al carrito.
    if(isset($_GET['add'])){

        $query = query("SELECT * FROM productos WHERE producto_id=" . escape_string($_GET['add']) . " ");
        confirm($query);

        while($row = fetch_array($query)){

            if($row['producto_cantidad'] != $_SESSION['producto_' . $_GET['add']]){

                $_SESSION['producto_' . $_GET['add']]+=1;
                redirect("../public_html_files/checkout.php");
            }else{

                mensaje_alerta("sólo tenemos " . $row['producto_cantidad'] . " " . "disponible");
                redirect("../public_html_files/checkout.php");

            }
        }

        //$_SESSION['producto_' . $_GET['add']] +=1;

        // redirect("index.php");

    }

//Funcion para quitar del carrito
    if(isset($_GET['remove'])){

        $_SESSION['producto_' . $_GET['remove']]--;

        if($_SESSION['producto_' . $_GET['remove']] < 1){
            unset($_SESSION['item_total']);
            unset($_SESSION['item_quantity']);
            redirect("../public_html_files/checkout.php");
        
        }else {

            redirect("../public_html_files/checkout.php");
        }


    }
//funcion para eliminar del carrito
    if(isset($_GET['delete'])){

        $_SESSION['producto_' . $_GET['delete']] = '0';
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public_html_files/checkout.php");



    }


    function cart(){

        $item_quantity = 0;
        $total = 0;
        $item_name = 1;
        $item_number = 1;
        $amount = 1;
        $quantity = 1;


        foreach ($_SESSION as $name => $value) {

            if($value > 0 ){


            if(substr($name, 0, 9) == "producto_"){


                $length = strlen($name - 9);

                $id = substr($name, 9, $length);

        $query = query("SELECT * FROM productos WHERE producto_id = " . escape_string($id). " ");
        confirm($query);

        while($row = fetch_array($query)){

            $sub = $row['producto_precio']*$value;
            $item_quantity +=$value;

            $producto_img = mostrar_imagen($row['producto_img']);

$producto = <<<DELIMETER

    <tr>
                <td>{$row['producto_titulo']}<br>
                                                
                <img width='140' src='../resources/{$producto_img}'>
                </td>
                <td>&#36;{$row['producto_precio']}</td>
                <td>{$value}</td>
                <td>&#36;{$sub}</td>
                <td></td>
                <td><a class="btn btn-warning" href="../resources/carrito.php?remove={$row['producto_id']}"><span class="glyphicon glyphicon-minus"> </span></a> 
                  <a class="btn btn-success" href="../resources/carrito.php?add={$row['producto_id']}"><span class="glyphicon glyphicon-plus"> </span></a> 
                <a class="btn btn-danger" href="../resources/carrito.php?delete={$row['producto_id']}"><span class="glyphicon glyphicon-remove"> </span></a></td>
            </tr>
            <input type="hidden" name="item_name_{$item_name}" value="{$row['producto_titulo']}">
            <input type="hidden" name="item_number{$item_number}" value="{$row['producto_id']}">
            <input type="hidden" name="amount_{$amount}" value="{$row['producto_precio']}">
            <input type="hidden" name="quantity_{$quantity}" value="{$row['producto_cantidad']}">


DELIMETER;
        
        echo $producto; 

        $item_name++;
        $item_number++;
        $amount++;
        $quantity++;



    }
$_SESSION['item_total'] = $total += $sub;
$_SESSION['item_quantity'] = $item_quantity;

   }
  }
 }
}

//Funcion para pagar con paypal el carrito
    function show_paypal(){

        if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1){

        $paypal_button = <<<DELIMETER

        <input type="image" name="upload" border="0"
        src="https://www.paypalobjects.com/es_ES/i/btn/btn_buynow_LG.gif"
        alt="PayPal - The safer, easier way to pay online">

DELIMETER;
    
    return $paypal_button;

        }

    }

function process_transaction(){

    if(isset($_GET['tx'])){

    $amout = $_GET['amt'];    
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    $total = 0;
    $item_quantity = 0;
        
    foreach ($_SESSION as $name => $value) {
    if($value > 0 ){
    if(substr($name, 0, 9) == "producto_"){

    $length = strlen($name - 9);
    $id = substr($name, 9, $length);
    $send_order = query("INSERT INTO ordenes (orden_amount, orden_transaction, orden_status, 
                                orden_currency) VALUES ('{$amout}','{$currency}', 
                                '{$transaction}','{$status}'')");

    $last_id = last_id();

    confirm($send_order);

        $query = query("SELECT * FROM productos WHERE producto_id = " . escape_string($id). " ");
        confirm($query);

        while($row = fetch_array($query)){

            $product_price = $row['producto_precio'];
            $producto_title = $row['product_title'];
            $sub = $row['producto_precio']*$value;
            $item_quantity +=$value;
            $insert_reporte = query("INSERT INTO reportes (product_id, order_id, product_title, product_price, product_quantity 
                                ) VALUES ('{$id}','{$product_title}','{$last_id}','{$product_price}', 
                                '{$value}')");

confirm($insert_reporte);
}
$total += $sub;
$item_quantity;
}
}
}
session_destroy();

} else {
redirect("index.php");
}
}








?>
