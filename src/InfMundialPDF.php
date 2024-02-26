<?php

 //Código para incluir las librerias
 include_once("conexion.php");
 include('MyFPDF.php');

 //Conexión con el servidor
  $link=ConectarseServidor();

 //Conexión con la base de datos
  ConectarseBaseDatos($link);

 //realiza consulta a la base de datos
 $sql = "select * from dwejer  order by id"; 
     
  $result=mysql_query($sql,$link);

   //inclusión de rutinas para crear informes PDF
   $pdf=new MyFPDF();
   $pdf->AddPage('P');
   $pdf->SetFont('Arial','B',11);
   $pdf->Cell(0,8,"Lista de Pedidos",0,0,'C',0);
   $pdf->Cell(0,20,"",0,1,'',0);

    //titulos de las columnas
    $pdf->SetTextColor(0,0,0); //rgb	
    //$pdf->Cell(30);	
    $pdf->Cell(15,8,'Id',1,0,'C');	
	$pdf->Cell(26,8,'Usuario',1,0,'C');	
	$pdf->Cell(26,8,'Procesador',1,0,'C');	
	$pdf->Cell(26,8,'Memoria',1,0,'C');	
	$pdf->Cell(35,8,'Disco Duro',1,0,'C');	
	$pdf->Cell(26,8,'Tarjeta De Video',1,0,'C');	
	$pdf->Cell(26,8,'Board',1,0,'C');	
	$pdf->Cell(26,8,'Valor',1,1,'C');	

		
    $pdf->SetFont('Arial','',10);

    //impresion de datos obtenidos desde la BD
	 while($row = mysql_fetch_array($result)){
       //   $pdf->Cell(30);	
  	  $pdf->Cell(15,8,$row["id"],1,0,'C');
         $pdf->Cell(26,8,$row["usuario"],1,0,'C');
         $pdf->Cell(26,8,$row["procesador"],1,0,'C');
         $pdf->Cell(26,8,$row["memoria"],1,0,'C');
         $pdf->Cell(35,8,$row["disco_duro"],1,0,'C');
         $pdf->Cell(26,8,$row["tarjeta_video"],1,0,'C');
         $pdf->Cell(26,8,$row["board"],1,0,'C');
         $pdf->Cell(26,8,$row["valor"],1,1,'C');

	 
      }//fin del while	
    
     //libera memoria
 	mysql_free_result ($result);

    //genera el PDF en el Navegador
  //  $pdf->Output();  

    //genera el PDF en un archivo
    $pdf->Output("E:\ReporteDatos.pdf");  


?>