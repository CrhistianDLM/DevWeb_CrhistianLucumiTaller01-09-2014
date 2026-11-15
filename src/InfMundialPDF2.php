<?php

//C�digo para incluir las librerias
include_once("conexion.php");
include('MyFPDF.php');

//Conexi�n con el servidor
$link = ConectarseServidor();

//Conexi�n con la base de datos
ConectarseBaseDatos($link);

//realiza consulta a la base de datos
$sql = "select 
  date as fecha,
  hour as hora,
  name as usuario,
  description as descripcion
 from usuarios  order by hora";

$result = mysqli_query($link, $sql);

//inclusi�n de rutinas para crear informes PDF
$pdf = new MyFPDF();
$pdf->FPDF();
$pdf->AddPage('P');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 8, "Lista de registros", 0, 0, 'C', 0);
$pdf->Cell(0, 20, "", 0, 1, '', 0);

//titulos de las columnas
$pdf->SetTextColor(0, 0, 0); //rgb	
//$pdf->Cell(30);	
$pdf->Cell(20, 15, 'Fecha', 1, 0, 'C');
$pdf->Cell(26, 15, 'Hora', 1, 0, 'C');
$pdf->Cell(26, 15, 'Usuario', 1, 0, 'C');
$pdf->Cell(130, 15, 'Descripcion', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);

//impresion de datos obtenidos desde la BD
while ($row = mysqli_fetch_array($result)) {
    //   $pdf->Cell(30);	
    $pdf->Cell(20, 15, $row["fecha"], 1, 0, 'C');
    $pdf->Cell(26, 15, $row["hora"], 1, 0, 'C');
    $pdf->Cell(26, 15, $row["usuario"], 1, 0, 'C');
    $pdf->Cell(130, 15, $row["descripcion"], 1, 1, 'C');
} //fin del while	

//libera memoria
mysqli_free_result($result);

//genera el PDF en el Navegador
$pdf->Output();  

//genera el PDF en un archivo
//$pdf->Output("E:\ReporteRegistro.pdf");
