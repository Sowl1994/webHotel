<?php
//Recibir detalles de factura
$id_factura = 1;
$fecha_factura = 1;

//Recibir los datos del cliente
$nombre_cliente = $_SESSION["nombre"];
$apellidos_cliente = $_SESSION["apellidos"];
$identificacion_fiscal_cliente = $_SESSION["dni"];

//Recibir los datos de los productos
$iva = "21";
$unidades = $_POST["unidades"];
$productos = $_POST["productos"];
$precio_unidad = $_POST["precio_unidad"];

//variable que guarda el nombre del archivo PDF
$archivo="factura-$id_factura.pdf";

//Llamada al script fpdf
require('fpdf.php');


$archivo_de_salida=$archivo;

$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.

//logo de la tienda
$pdf->Image('../empresa.jpg' , 0 ,0, 40 , 40,'JPG', '');

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA HOTEL PLAZA NUEVA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, "Número de factura: $id_factura"."\n"."Fecha: $fecha_factura", 0, "C", false);
$pdf->Ln(2);

// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos Hotel Plaza Nueva:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posición X
5, //posición Y
"Hotel Plaza Nueva \n".
"Dirección: Calle Imprenta, 2\n".
"Provincia: Granada\n".
"Código Postal: 18010 \n".
"Teléfono: 958 21 52 73 \n",
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado 
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posición X
5, //posicion Y
"Nombre: ".$nombre_cliente."\n".
"Apellidos: ".$apellidos_cliente."\n".
"DNI: ".$identificacion_fiscal_cliente, 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de línea
$pdf->Ln(2);

// extracción de los datos de los productos a través de la función explode
$e_productos = explode(",", $productos);
$e_unidades = explode(",", $unidades);
$e_precio_unidad = explode(",", $precio_unidad);

//Creación de la tabla de los detalles de los productos productos
$top_productos = 110;
    $pdf->SetXY(45, $top_productos);
    $pdf->Cell(40, 5, 'Cantidad', 0, 1, 'C');
    $pdf->SetXY(80, $top_productos);
    $pdf->Cell(40, 5, 'Habitacion', 0, 1, 'C');
    $pdf->SetXY(115, $top_productos);
    $pdf->Cell(40, 5, 'Precio/Unidad', 0, 1, 'C');    
 
$precio_subtotal = 0; // variable para almacenar el subtotal
$y = 115; // variable para la posición top desde la cual se empezarán a agregar los datos
$x=0;
while($x <= count($e_productos) - 1)
{
$pdf->SetFont('Arial','',8);
       
   $pdf->SetXY(45, $y);
    $pdf->Cell(40, 5, $e_unidades[$x], 0, 1, 'C');
    $pdf->SetXY(80, $y);
    $pdf->Cell(40, 5, $e_productos[$x], 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $e_precio_unidad[$x]." €", 0, 1, 'C');

//Cálculo del subtotal 	
$precio_subtotal += $e_precio_unidad[$x] * $e_unidades[$x];
$x++;

// aumento del top 5 cm
$y = $y + 5;
}

//Cálculo del Impuesto
$add_iva = $precio_subtotal * $iva / 100;

//Cálculo del precio total
$total_mas_iva = round($precio_subtotal + $add_iva + 0, 2);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 5, "I.V.A: $iva %", 0, 1, "C");
$pdf->Cell(190, 5, "Subtotal: $precio_subtotal €", 0, 1, "C");
$pdf->Cell(190, 5, "TOTAL: ".$total_mas_iva." €", 0, 1, "C");
$pdf->Output($archivo_de_salida);//cierra el objeto pdf

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminación del archivo en el servidor
unlink($archivo);