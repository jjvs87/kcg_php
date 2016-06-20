<?php


//****************VARIABLES

$uploads_directory = "uploads";

// Funciones de Ayuda

	function last_id(){

		global $connection;

		return mysqli_insert_id($connection);


	}

	function mensaje_alerta($msg){
		if(!empty($msg)){
			$_SESSION['message'] = $msg;
		}else{
			$msg = "";
		}
	}

	function mostrar_mensaje(){
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}

	function redirect($location){

	header("Location: $location ");

	}

	function query($sql){

		global $connection;
		return mysqli_query($connection, $sql);
	}

	function confirm($result){

		global $connection;

		if(!$result){

			die ("Fallo la conexion " . mysqli_error($connection));
		}
	}

	function escape_string($string){

		global $connection;

		return mysqli_real_escape_string($connection, $string);

	}

	function fetch_array($result){

		return mysqli_fetch_array($result);

	}


/*////////////////////////// FUNCIONES FRONT END *//////////////////////////

// LLamar Productos

	function llamar_productos(){

		$query = query("SELECT * FROM productos WHERE producto_cantidad >=1 ");

		confirm($query);

		while($row = fetch_array($query)){

		$producto_img = mostrar_imagen($row['producto_img']);

		$producto = <<<DELIMETER
		<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['producto_id']}"><img src="../resources/{$producto_img}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&#36;{$row['producto_precio']}</h4>
                                <h4><a href="item.php?id={$row['producto_id']}">{$row['producto_titulo']}</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                <a class="btn btn-primary" href="../resources/carrito.php?add={$row['producto_id']}">Agregar al carrito</a>

                            </div>

                        </div>
                    </div>
DELIMETER;

		echo $producto;



		}
	}


	function categorias(){

		$query = query("SELECT * FROM categorias");


		confirm($query);

		while($row = fetch_array($query)){

		$categoria_links = <<<DELIMETER

		<a href="category.php?id={$row['id_cat']}" class='list-group-item'>{$row['cat_titulo']}</a>

DELIMETER;

		echo $categoria_links;

	}

	}


// llamar articulos en categorias

	function llamar_productos_en_categorias(){

		$query = query("SELECT * FROM productos WHERE producto_categoria_id = " . escape_string($_GET['id']) . " AND producto_cantidad >=1");

		confirm($query);

		while($row = fetch_array($query)){

		$producto_img = mostrar_imagen($row['producto_img']);

		$producto = <<<DELIMETER
		<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?id={$row['producto_id']}"><img src="../resources/{$producto_img}"></a>
                    <div class="caption">
                        <h3><a href="item.php?id={$row['producto_id']}">{$row['producto_titulo']}</a></h3>

                        <p>{$row['desc_corta']}</p>
                        <p>
                            <a href="../resources/carrito.php?add={$row['producto_id']}" class="btn btn-primary">Comprar</a> <a href="item.php?id={$row['producto_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

		echo $producto;



		}
	}

	function llamar_productos_en_subcategorias(){

		$query = query("SELECT * FROM productos WHERE subcat_id = " . escape_string($_GET['id']) . " AND producto_cantidad >=1");

		confirm($query);

		while($row = fetch_array($query)){

		$producto_img = mostrar_imagen($row['producto_img']);

		$producto = <<<DELIMETER
		<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?id={$row['producto_id']}"><img src="../resources/{$producto_img}"></a>
                    <div class="caption">
                        <h3><a href="item.php?id={$row['producto_id']}">{$row['producto_titulo']}</a></h3>

                        <p>{$row['desc_corta']}</p>
                        <p>
                            <a href="../resources/carrito.php?add={$row['producto_id']}" class="btn btn-primary">Comprar</a> <a href="item.php?id={$row['producto_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

		echo $producto;



		}
	}

	function llamar_productos_en_pagina_tienda(){

		$query = query("SELECT * FROM productos WHERE producto_cantidad >=1");

		confirm($query);

		while($row = fetch_array($query)){
		$producto_img = mostrar_imagen($row['producto_img']);
		$producto = <<<DELIMETER
		<div class="col-md-8 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$producto_img}">
                    <div class="caption">
                        <h3>{$row['producto_titulo']}</h3>

                        <p>{$row['desc_corta']}</p>
                        <p>
                            <a href="../resources/carrito.php?add={$row['producto_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['producto_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

		echo $producto;



		}
	}

	function acceso_usuario(){

		if(isset($_POST['submit'])){

			$username = escape_string($_POST['username']);
			$password = escape_string($_POST['password']);

			$query = query("SELECT * FROM usuarios WHERE username = '{$username}' AND password = '{$password}' ");
			confirm($query);

			if(mysqli_num_rows($query) == 0){

				mensaje_alerta("Tu contraseña o usuario con incorrectos");
				redirect("login.php");

			}else {

				$_SESSION['username'] = $username;

				redirect("admin");
			}

		}


	}

	function enviar_correo(){

		if(isset($_POST['submit'])){

			$to 		= "ing.jjvs@gmail.com";
			$from_name 	= $_POST['nombre'];
			$asunto 	= $_POST['asunto'];
			$email 		= $_POST['email'];
			$mensaje 	= $_POST['mensaje'];

			$headers = "De: {$from_name} {$email}";

			$result = mail($to, $asunto, $mensaje, $headers);

			if(!$result){
				mensaje_alerta("Lo siento no se envio el mensaje");
				redirect("contacto.php");
			}else{
				mensaje_alerta("Tu mensaje a sido enviado");
				redirect("contacto.php");
			}
		}

	}


/*////////////////////////// FUNCIONES BACK END *//////////////////////////

	function mostrar_ordenes(){

		$query = query("SELECT * FROM ordenes");
		confirm($query);

		while($row = fetch_array($query)){

			$orders = <<<DELIMETER
	<tr>
		<td>{$row['orden_id']}</td>
		<td>{$row['orden_amount']}</td>
		<td>{$row['orden_transaction']}</td>
		<td>{$row['orden_currency']}</td>
		<td>{$row['orden_status']}</td>
		<td><a class="btn btn-danger" href="index.php?delete_order_id={$row['orden_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr>


DELIMETER;
echo $orders;
		}



	}




/*///////////////////////ADMIN PRODUCTOS ////////////////*/

	function mostrar_imagen($picture){

		global $uploads_directory;

		return $uploads_directory . DS . $picture;

	}



	function llamar_productos_admin(){

			$query = query("SELECT * FROM productos");
			confirm($query);

			while($row = fetch_array($query)){

			$categoria = mostrar_titulo_categoria_producto($row['producto_categoria_id']);
			$subcategoria = mostrar_subcategoria_producto($row['subcat_id']);

			$producto_img = mostrar_imagen($row['producto_img']);

			$producto = <<<DELIMETER
			<tr>
            <td>{$row['producto_id']}</td>
            <td>{$row['producto_titulo']}<br>
             <a href="index.php?edit_product&id={$row['producto_id']}"><img width='120' src="../../resources/{$producto_img}" alt=""></a>
            </td>
            <td>{$categoria}</td>
						<td>{$subcategoria}</td>
            <td>&#36;{$row['producto_precio']}</td>
            <td>{$row['producto_cantidad']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['producto_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;

			echo $producto;



			}
		}


		function mostrar_titulo_categoria_producto($producto_categoria_id){

			$categoria_query = query("SELECT * FROM categorias WHERE id_cat = '{$producto_categoria_id}' ");
			confirm($categoria_query);

			while($categoria_row = fetch_array($categoria_query)){

				return $categoria_row['cat_titulo'];
			}
		}

		function mostrar_subcategoria_producto($producto_subcategoria_id){

			$subcategoria_query = query("SELECT * FROM subcategoria WHERE id_subcategoria = '{$producto_subcategoria_id}' ");
			confirm($subcategoria_query);

			while($subcategoria_row = fetch_array($subcategoria_query)){

				return $subcategoria_row['subcategoria'];
			}
}



/************************ Agregar Productos en Administrador ***********************/

	function agregar_producto(){

		if(isset($_POST['publish'])){

		$producto_titulo 		= escape_string($_POST['producto_titulo']);
		$producto_categoria_id	= escape_string($_POST['producto_categoria_id']);
		$subcat_id 				= escape_string($_POST['subcat_id']);
		$marca_producto			= escape_string($_POST['marca_producto']);
		$producto_precio 		= escape_string($_POST['producto_precio']);
		$producto_descripcion 	= escape_string($_POST['producto_descripcion']);
		$producto_cantidad	 	= escape_string($_POST['producto_cantidad']);
		$desc_corta 			= escape_string($_POST['desc_corta']);
		$producto_img			= escape_string($_FILES['file']['name']);
		$imagen_temp_location	= escape_string($_FILES['file']['tmp_name']);


		move_uploaded_file($imagen_temp_location , UPLOAD_DIRECTORY . DS . $producto_img);


		$query = query("INSERT INTO productos (producto_titulo, producto_precio, producto_categoria_id, subcat_id, producto_descripcion, desc_corta, producto_cantidad, producto_img, marca_producto)
						VALUES('{$producto_titulo}','{$producto_precio}', '{$producto_categoria_id}', '{$subcat_id}', '{$producto_descripcion}', '{$desc_corta}', '{$producto_cantidad}', '{$producto_img}', '{$marca_producto}') ");
		$last_id = last_id();
		confirm($query);
		mensaje_alerta("Nuevo producto id {$last_id} fue agregado");
		redirect("index.php?products");


		}


	}


		function mostrar_categorias_agregar_producto(){

		$query = query("SELECT * FROM categorias");
		confirm($query);

		while($row = fetch_array($query)){

		$categoria_opciones = <<<DELIMETER

		<option value="{$row['id_cat']}">{$row['cat_titulo']}</option>

DELIMETER;

		echo $categoria_opciones;

	}

	}

	function mostrar_subcategorias_agregar_producto(){

	$query = query("SELECT * FROM subcategoria");
	confirm($query);

	while($row = fetch_array($query)){

	$subcategoria_opciones = <<<DELIMETER

	<option value="{$row['id_subcategoria']}">{$row['subcategoria']}</option>

DELIMETER;

	echo $subcategoria_opciones;

}

}

function mostrar_marca_producto(){

$query = query("SELECT * FROM marcas");
confirm($query);

while($row = fetch_array($query)){

$marca_opciones = <<<DELIMETER

<option value="{$row['id_marca']}">{$row['nombre']}</option>

DELIMETER;

echo $marca_opciones;

}

}

/*********************  ACTUALIZAR PRODUCTO   *********************/


	function actualizar_producto(){

		if(isset($_POST['update'])){

		$producto_titulo 		= escape_string($_POST['producto_titulo']);
		$producto_categoria_id	= escape_string($_POST['producto_categoria_id']);
		$subcat_id	= escape_string($_POST['subcat_id']);
		$marca_producto			= escape_string($_POST['marca_producto']);
		$producto_precio 		= escape_string($_POST['producto_precio']);
		$producto_descripcion 	= escape_string($_POST['producto_descripcion']);
		$producto_cantidad	 	= escape_string($_POST['producto_cantidad']);
		$desc_corta 			= escape_string($_POST['desc_corta']);
		$producto_img			= escape_string($_FILES['file']['name']);
		$imagen_temp_location	= escape_string($_FILES['file']['tmp_name']);


		if(empty($producto_img)){

			$get_pic = query("SELECT producto_img FROM productos WHERE producto_id =" . escape_string($_GET['id']). " ");
			confirm($get_pic);

			while($pic = fetch_array($get_pic)){

				$producto_img = $pic['producto_img'];

			}
		}

		move_uploaded_file($imagen_temp_location , UPLOAD_DIRECTORY . DS . $producto_img);


		$query = "UPDATE productos SET ";
		$query .= "producto_titulo 			= '{$producto_titulo}'			, ";
		$query .= "producto_categoria_id 	= '{$producto_categoria_id}'	, ";
		$query .= "subcat_id 	= '{$subcat_id}'	, ";
		$query .= "marca_producto 	= '{$marca_producto}'	, ";
		$query .= "producto_precio 			= '{$producto_precio}'			, ";
		$query .= "producto_descripcion 	= '{$producto_descripcion}'		, ";
		$query .= "producto_cantidad 		= '{$producto_cantidad}'		, ";
		$query .= "desc_corta  				= '{$desc_corta}'				, ";
		$query .= "producto_img  			= '{$producto_img}'				 ";
		$query .= "WHERE producto_id=" . escape_string($_GET['id']);

		$send_update_query = query($query);
		confirm($send_update_query);
		mensaje_alerta("El producto fue actualizado");
		redirect("index.php?products");


		}


	}

/***********************   CATEGORIAS EN ADMIN **************/

	function mostrar_categorias_admin(){

		$categoria_query = query("SELECT * FROM categorias");
		confirm($categoria_query);

		while($row = fetch_array($categoria_query)){
            $cat_id = $row['id_cat'];
			$cat_title = $row['cat_titulo'];

		$categoria = <<<DELIMETER
		<tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_categoria.php?id={$row['id_cat']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;

	echo $categoria;
		}


	}

function mostrar_subcategorias_admin(){


		$subcategoria_query = query("SELECT * FROM subcategoria");
		confirm($subcategoria_query);



		while($row = fetch_array($subcategoria_query)){
$categoria = mostrar_titulo_categoria_subcategorias($row['id_categorias']);
			$id_subcategoria = $row['id_subcategoria'];
			$subcategoria = $row['subcategoria'];
			$id_categorias = $row['id_categorias'];


		$subcategoria = <<<DELIMETER
		<tr>
            <td>{$id_subcategoria}</td>
            <td>{$subcategoria}</td>
            <td>{$categoria}</td>

            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_subcategoria.php?id={$row['id_subcategoria']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;

	echo $subcategoria;
		}


	}

	function mostrar_titulo_categoria_subcategorias($id_categorias){

			$subcategoria_query = query("SELECT * FROM categorias WHERE id_cat = '{$id_categorias}' ");
			confirm($subcategoria_query);

			while($subcategoria_row = fetch_array($subcategoria_query)){

				return $subcategoria_row['cat_titulo'];
			}

		}

	function agregar_categoria(){

		if(isset($_POST['add_category'])){

	$cat_titulo = escape_string($_POST['cat_titulo']);

	if(empty($cat_titulo) || $cat_titulo == " "){

		echo "<p class='bg bg-success'>Se Agrego la categoria</p>";

	}else{



	$insertar_cat = query("INSERT INTO categorias(cat_titulo) VALUES('{$cat_titulo}') ");
	confirm($insertar_cat);
	mensaje_alerta("Categoria Creada");



		}

}
	}


function agregar_subcategoria(){

//    echo "<pre>";  print_r($_POST); echo "</pre>";
		if(isset($_POST['add_subcategoria'])){

	$subcategoria  = escape_string($_POST['subcategoria']);
    $id_categorias = escape_string($_POST['id_categorias']);


    if(empty($id_categorias) || $id_categorias == " ")

    {

     }if(empty($subcategoria) || $subcategoria == " ")

    {

		echo "<p class='bg bg-success'>Se Agrego la categoria</p>";

	}else{
	$insertar_subcat = query("INSERT INTO subcategoria (subcategoria, id_categorias) VALUES('{$subcategoria}','{$id_categorias}') ");
	confirm($insertar_subcat);
	mensaje_alerta("Sucategoria Creada");
    }
}
}

function mostrar_categorias_agregar_subcategorias(){

		$query = query("SELECT * FROM categorias");
		confirm($query);

		while($row = fetch_array($query)){

		$categoria_opciones = <<<DELIMETER

		<option value="{$row['id_cat']}">{$row['cat_titulo']}</option>

DELIMETER;

		echo $categoria_opciones;

	}

	}
/******************** Marcas *************************/

    function agregar_marca(){
    // echo "<pre>";  print_r($_POST); echo "</pre>";
		if(isset($_POST['add_marca'])){

		$nombre                 = escape_string($_POST['nombre']);
    $descripcion            = escape_string($_POST['descripcion']);
    $imagen_marca						= escape_string($_FILES['file']['name']);
    $imagen_marca_location	= escape_string($_FILES['file']['tmp_name']);

    move_uploaded_file($imagen_marca_location , UPLOAD_DIRECTORY . DS . $imagen_marca);

	if(empty($nombre) || $nombre == " ")
    {

		echo "<p class='alert alert-warning'>Campos vacios!</p>";

	}else{

	$insertar_marca = query("INSERT INTO marcas(nombre, descripcion, imagen_marca) VALUES('{$nombre}','{$descripcion}', '{$imagen_marca}') ");
	confirm($insertar_marca);
	mensaje_alerta("Marca Creada");



		}

}
	}

	function mostrar_marcas_admin(){


		$categoria_query = query("SELECT * FROM marcas");
		confirm($categoria_query);



		while($row = fetch_array($categoria_query)){

			$marca_id = $row['id_marca'];
			$marca_nombre = $row['nombre'];
            $marca_descripcion = $row['descripcion'];
            $imagen_marca = mostrar_imagen($row['imagen_marca']);

		$marca = <<<DELIMETER
		<tr>
            <td>{$marca_id}</td>
            <td>{$marca_nombre}</td>
            <td>{$marca_descripcion}</td>
            <td><img width='120' src="../../resources/{$imagen_marca}" alt=""></td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_marcas.php?id={$row['id_marca']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMETER;

	echo $marca;
		}


	}

/********************  Admin Usuarios  *******************/

	function mostrar_usuarios_admin(){


		$usuarios_query = query("SELECT * FROM usuarios");
		confirm($usuarios_query);

		while($row = fetch_array($usuarios_query)){

			$id_usuario = $row['id_usuario'];
			$username = $row['username'];
			$email = $row['email'];
			$password = $row['password'];

			mensaje_alerta("Usuario eliminado");

		$usuarios = <<<DELIMETER
		<tr>
		<td>$id_usuario</td>
		<td>$username</td>
        <td>$email</td>
        <td><a class="btn btn-danger" href="../../resources/templates/back/delete_usuario.php?id={$row['id_usuario']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

	echo $usuarios;
		}


	}


	function agregar_usuario(){

		if(isset($_POST['add_user'])){

		$username = escape_string($_POST['username']);
		$email	  = escape_string($_POST['email']);
		$password = escape_string($_POST['password']);
		// $user_photo = escape_string($_FILES['file']['name']);
		// $photo_temp = escape_string($_FILES['file']['tmp_name']);

		// move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);

		$query = query("INSERT INTO usuarios(username,email,password) VALUES('{$username}','{$email}','{$password}')");

		confirm($query);

		mensaje_alerta("Usuario Creado");

		redirect("index.php?users");

		}


	}


// ***************** Reportes *****************

	function mostrar_reportes(){

			$query = query("SELECT * FROM reportes");
			confirm($query);

			while($row = fetch_array($query)){

			$reporte = <<<DELIMETER
			<tr>
			<td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>&#36;{$row['product_price']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_orders.php?id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>

        </tr>
DELIMETER;

			echo $reporte;



			}
		}


/********************* Slider Funciones ***********/


	function add_slides(){

		if(isset($_POST['add_slide'])){

		$slide_title = escape_string($_POST['slide_title']);
		$slides_image = escape_string($_FILES['file']['name']);
		$slides_image_loc = escape_string($_FILES['file']['tmp_name']);

		if(empty($slide_title) || empty($slides_image)){

			echo"<p class='bg-danger'> este campo no puede estar vacío</p>";

		}else{

			move_uploaded_file($slides_image_loc, UPLOAD_DIRECTORY . DS . $slides_image);

			$query = query("INSERT INTO slides(slide_title, slides_image) VALUES('{$slide_title}', '{$slides_image}')");
			confirm($query);
			mensaje_alerta("Slides agregado");
			redirect("index.php?slides");
		}

	}
    }

	function get_current_slide_in_admin(){

		$query = query("SELECT * FROM slides ORDER BY slides_id DESC LIMIT 1");
		confirm($query);

		while($row = fetch_array($query)){

		$slides_image = mostrar_imagen($row['slides_image']);

		$slides_active_admin = <<<DELIMETER


            <img class="img-responsive" src="../../resources/{$slides_image}" alt="">


DELIMETER;

		echo $slides_active_admin;

		}


	}

	function get_active(){

		$query = query("SELECT * FROM slides ORDER BY slides_id DESC LIMIT 1");
		confirm($query);

		while($row = fetch_array($query)){

		$slides_image = mostrar_imagen($row['slides_image']);

		$slides_active = <<<DELIMETER

		<div class="item active">
            <img class="slide-image" src="../resources/{$slides_image}" alt="">
        </div>

DELIMETER;

		echo $slides_active;

		}

	}

	function get_slides(){

		$query = query("SELECT * FROM slides");
		confirm($query);

		while($row = fetch_array($query)){

		$slides_image = mostrar_imagen($row['slides_image']);

		$slides = <<<DELIMETER

		<div class="item">
            <img class="slide-image" src="../resources/{$slides_image}" alt="">
        </div>

DELIMETER;

		echo $slides;

		}

	}

	function get_slide_thumbnails(){


		$query = query("SELECT * FROM slides ORDER BY slides_id ASC ");
		confirm($query);

		while($row = fetch_array($query)){

		$slides_image = mostrar_imagen($row['slides_image']);

		$slides_thumb_admin = <<<DELIMETER

		<div class="col-xs-6 col-md-3 image_container">

  		<a href="index.php?delete_slide_id={$row['slides_id']}">

		<img id="slider_admin" class="img-responsive" src="../../resources/{$slides_image}" alt="">
  		</a>
		<div class=caption>
		<p>{$row['slide_title']}</p>
		</div>
  </div>


DELIMETER;

		echo $slides_thumb_admin;

		}



	}
// ************ FUNCION DE AGREGAR VIDEO EN INICIO *********

	function agregar_video(){

	if(isset($_POST['add_video'])){

	$link = escape_string($_POST['link']);

	$query = query("INSERT INTO video_youtube (link) VALUES ('{link}')");
	confirm($query);
			mensaje_alerta("Slides agregado");
			redirect("index.php?slides");
}
}

// ************ FUNCION DE AGREGAR VIDEO EN INICIO *********
 ?> <!-- FIN PHP -->
