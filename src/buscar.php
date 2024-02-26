
<?php
include_once("conexion.php");
$idd=$_POST["busca"];
$link=ConectarseServidor();

 //Conexión con la base de datos
  ConectarseBaseDatos($link);

 //realiza consulta a la base de datos
 $sql = "select * from dwejer  where id=$idd"; 
     
  $result=mysql_query($sql,$link);
  $dates=mysql_fetch_array($result);

echo "<script type=text/javascript> alert(' id = $dates[0] \\n Usuario = $dates[1] \\n Procesador = $dates[2] \\n Memoria = $dates[3] \\n Disco Duro = $dates[4] \\n Tarjeta de Video = $dates[5] \\n Board = $dates[6] \\n Valor = $dates[7]');</script>";
echo "<script>window.history.back();</script>";
?>
