<?php
	define("DB_NAME", "tienda_equipos");
	define("DB_HOST", "localhost");
	define("DB_USER", "devepweb");
	define("DB_PASSWORD", "hA1I_!iX!QKl3v5/");

	function ConectarseServidor()
	{
		if (!($link=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, null, 8889)))
		{
			echo "Error conectando a la base de datos.";
			exit();
		}
		//echo "Conexi�n con la base de datos conseguida.<br>";
		return $link;
	}

	function ConectarseBaseDatos($link)
	{
		if (!mysqli_select_db($link, DB_NAME))
		{
			echo "Error seleccionando la base de datos.";
			exit();
		}
		//echo "Selecci�n con la base de datos conseguida.<br>";
	}

	function desconectarse($link)
	{
		if(!mysqli_close($link))
		{
			echo "FALLO CERRANDO LA CONEXION";
			exit();
		}; //cierra la conexion
		//echo "se cerro la base de datos";
	}

	function consultas($link, $consulta)
	{
		$respuesta=mysqli_query($link, $consulta) or die(mysqli_error($link));
		return $respuesta;
	}
	
	
?>