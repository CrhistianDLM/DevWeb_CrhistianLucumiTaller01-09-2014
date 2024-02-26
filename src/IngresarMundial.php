<HTML>
<title>
   Estudiante
</title>

<BODY>
<?php
	/*Código para incluir las librerias*/
	include_once("conexion.php");

	/*Recuperación de variables*/
	$id   =  $_REQUEST["txtId"];	
        $usuario =  $_REQUEST["txtUsu"];
		$procesador  =  $_REQUEST["txtPro"];	
        $memoria  =  $_REQUEST["txtMem"];
		$disco  =  $_REQUEST["txtDis"];	
        $tarjeta =  $_REQUEST["txtTar"];	
        $board =  $_REQUEST["txtBoa"];	
        $valor =  $_REQUEST["txtVal"];	
			
      
			
	/*Conexión con el servidor*/
	$link=ConectarseServidor();

	/*Conexión con la base de datos*/
	ConectarseBaseDatos($link);

	/*Expresión SQL para insertar datos en una tabla*/
 	$consulta="insert into dwejer values( $id,'$usuario', '$procesador', '$memoria', '$disco', '$tarjeta', '$board', $valor )";
	
$datee=getdate();
$hora=date("g - H - a");
$fecha= date("d")."-".date("m")."-".date("Y");
$decripti="El Usuario ". $usuario. " identificado con el id ". $id. " hizo la orden el ". $fecha;
$consultas="insert into dwejer2 values('$fecha', '$hora','$usuario', '$decripti')";
	/*Ejecución de la inserción*/
	$respuesta=consultas($consulta);

        //valida que se haya insertado correctamente el registro
        if ( $respuesta == 1  ){
	
     	  $sbCadena =  "<script language='javascript'>";
          $sbCadena .= "alert(  'Datos Ingresad@ Correctamente ' )";
     	  $sbCadena .= "</script>";
     	  echo $sbCadena;
		 
 	  //retorna a la pagina anterior
          $sbCadena = '<script>window.history.back();</script>';
	  echo $sbCadena;  	
        }
	else{
	
	      $sbCadena =  "<script language='javascript'>";
	      $sbCadena .= "alert(  'Error al Ingresar Datos, Verifique los Datos' )";
       	      $sbCadena .= "</script>";
              echo $sbCadena;
		 
	      //retorna a la pagina anterior
	      $sbCadena = '<script>window.history.back();</script>';
	      echo $sbCadena;  	
    
	}
	/*Ejecución de la inserción*/
	$respuestas=consultas($consultas);

        //valida que se haya insertado correctamente el registro
        if ( $respuestas == 1  ){
	
     	  $sbCadenas =  "<script language='javascript'>";
          $sbCadenas .= "alert(  'Datos Ingresad@ Correctamente ' )";
     	  $sbCadenas .= "</script>";
     	  echo $sbCadenas;
		 
 	  //retorna a la pagina anterior
          $sbCadenas = '<script>window.history.back();</script>';
	  echo $sbCadenas;  	
        }
	else{
	
	      $sbCadenas =  "<script language='javascript'>";
	      $sbCadenas .= "alert(  'Error al Ingresar Datos, Verifique los Datos' )";
       	      $sbCadenas .= "</script>";
              echo $sbCadenas;
		 
	      //retorna a la pagina anterior
	      $sbCadenas = '<script>window.history.back();</script>';
	      echo $sbCadenas;  	
    
	}
	
	

	/*Función para desconectarse de la base de datos*/
	desconectarse($link);//cierra la conexion


?>
</BODY>
</HTML>
