<HTML>
<title>
	Estudiante
</title>

<BODY>
	<?php
	/*C�digo para incluir las librerias*/
	include_once("conexion.php");
	include_once("UserModel.php");

	/*Recuperaci�n de variables*/
	$id   =  $_REQUEST["txtId"];
	$usuario =  $_REQUEST["txtUsu"];
	$procesador  =  $_REQUEST["txtPro"];
	$memoria  =  $_REQUEST["txtMem"];
	$disco  =  $_REQUEST["txtDis"];
	$tarjeta =  $_REQUEST["txtTar"];
	$board =  $_REQUEST["txtBoa"];
	$valor =  $_REQUEST["txtVal"];



	/*Conexi�n con el servidor*/
	$link = ConectarseServidor();

	/*Conexi�n con la base de datos*/
	ConectarseBaseDatos($link);

	/*Expresi�n SQL para insertar datos en una tabla*/
	$user = UserModel::getInstance($link)->getUserByEmail($usuario);
	$datee = getdate();
	//$hora = date("g - H - a");
	$hora = date("H:g");
	$fecha =  date("Y"). "-" .date("m"). "-" . date("d");
	$userId = 0;
	$descripti = "El Usuario " . $usuario ." hizo la orden el " . $fecha;
	if(empty($user)){
		$userId = UserModel::getInstance($link)->addUser($fecha, $hora, $usuario, $descripti);		
	}else{
		$userId = $user->id;
	}
	$consulta = "insert into computadoras(user_id, processor, memoria, disco, tarjeta, board, valor) values('$userId', '$procesador', '$memoria', '$disco', '$tarjeta', '$board', $valor )";
	//$consultas = "insert into usuarios values('$fecha', '$hora','$usuario', '$descripti')";
	/*Ejecuci�n de la inserci�n*/
	$respuesta = consultas($link, $consulta);
	
	//valida que se haya insertado correctamente el registro
	if ($respuesta == 1) {

		$sbCadena =  "<script language='javascript'>";
		$sbCadena .= "alert(  'Datos Ingresad@ Correctamente ' )";
		$sbCadena .= "</script>";
		echo $sbCadena;

		//retorna a la pagina anterior
		$sbCadena = '<script>window.history.back();</script>';
		echo $sbCadena;
	} else {

		$sbCadena =  "<script language='javascript'>";
		$sbCadena .= "alert(  \"Error al Ingresar Datos, Verifique los Datos\\n\"+\"".htmlspecialchars(mysqli_error($link))."\" )";
		$sbCadena .= "</script>";
		echo $sbCadena;

		//retorna a la pagina anterior
		$sbCadena = '<script>window.history.back();</script>';
		echo $sbCadena;
	}
	/*Ejecuci�n de la inserci�n*/
	$respuestas = $userId > 0 ? 1 : 0;

	//valida que se haya insertado correctamente el registro
	if ($respuestas == 1) {

		$sbCadenas =  "<script language='javascript'>";
		$sbCadenas .= "alert(  'Datos Ingresad@ Correctamente ' )";
		$sbCadenas .= "</script>";
		echo $sbCadenas;

		//retorna a la pagina anterior
		$sbCadenas = '<script>window.location.href = "../frm/frmIngresarEstudiante.html";</script>';
		echo $sbCadenas;
	} else {

		$sbCadenas =  "<script language='javascript'>";
		$sbCadenas .= "alert(  \"Error al Ingresar Datos, Verifique los Datos\\n\"+\"".htmlspecialchars(mysqli_error($link))."\")";
		$sbCadenas .= "</script>";
		echo $sbCadenas;

		//retorna a la pagina anterior
		$sbCadenas = '<script>window.history.back();</script>';
		echo $sbCadenas;
	}



	/*Funci�n para desconectarse de la base de datos*/
	desconectarse($link); //cierra la conexion


	?>
</BODY>

</HTML>