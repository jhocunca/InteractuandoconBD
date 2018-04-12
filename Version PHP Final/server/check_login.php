<?php

	require_once('conector.php');

	

  $con = new ConectorBD('localhost','root','');
	$respuesta['msg'] = $con->iniciarConexion('nextu');

  	if ($respuesta['msg']=='OK') {
      	$consulta = $con->consultarDatos(['usuarios'], ['id', 'email', 'clave'], 'WHERE email="'.$_POST['username'].'"');
      	if ($consulta->num_rows != 0) {
        	$fila = $consulta->fetch_assoc();
        	if (password_verify($_POST['password'], $fila['clave'])) {
       			$respuesta['acceso'] = 'concedido';
          	session_start();
            $_SESSION['user_id'] = $fila['id'];
          	$_SESSION['username'] = $fila['email'];
        	}else{
		        $respuesta['motivo'] = 'Contraseña incorrecta';
	      	}
    	}else{
      		$respuesta['motivo'] = 'Email incorrecto';
    	}
  	}
  	echo json_encode($respuesta);
  	$con->cerrarConexion();
?>
