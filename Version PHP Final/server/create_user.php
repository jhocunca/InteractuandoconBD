<?php

  	require_once('conector.php');

  	$datos = array(
      'nombre' => 'jhon edwin cundumi',
      'email' => 'jhonc@nextu.com',
      'clave' => password_hash("123456", PASSWORD_DEFAULT),
      'nacimiento' => '1980-03-11');

    $con = new ConectorBD('localhost','root','');
  	$respuesta = $con->iniciarConexion('nextu');

  	if ($respuesta == 'OK') {
    	if($con->insertarRegistro('usuarios', $datos)){
      		$respuesta = "exito en la inserción";
	    }else {
	      	$respuesta = "Hubo un error y los datos no han sido cargados";
	    }
  	}else {
    	$respuesta = "No se pudo conectar a la base de datos";
  	}
    $con->cerrarConexion();
?>
