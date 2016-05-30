<?php
if ($_POST["generar_factura"] == "true")
{

define('EURO',chr(128));
//Recibir detalles de factura
$id_factura = 666;
$fecha_factura = "06-06-2016";

//Recibir los datos del cliente
$nombre_cliente = "Juan";
$apellidos_cliente = "Pérez";
$identificacion_fiscal_cliente = "6434123";

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
$pdf->MultiCell(190,5, utf8_decode("Número de factura: $id_factura")."\n"."Fecha: $fecha_factura", 0, "C", false);
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
utf8_decode("Dirección: Calle Imprenta, 2\n") .
utf8_decode("Provincia: Granada\n").
utf8_decode("Código Postal: 18010 \n").
utf8_decode("Teléfono: 958 21 52 73 \n"),
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
"Nombre: ". utf8_decode($nombre_cliente)."\n".
"Apellidos: ". utf8_decode($apellidos_cliente)."\n".
"DNI: ". utf8_decode($identificacion_fiscal_cliente), 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de línea
$pdf->Ln(1);

$datos[0] = "habitacion Doble";
$datos[1] = "15";
$datos[2] = "habitacion Triple";
$datos[3] = "16";
$datos[4] = "habitacion Triple";
$datos[5] = "16";
$datos[6] = "habitacion Triple";
$datos[7] = "16";

    $top_productos = 100;
        $pdf->SetXY(45, $top_productos);
        $pdf->Cell(40, 5, 'Habitacion', 0, 1, 'C');
        $pdf->SetXY(115, $top_productos);
        $pdf->Cell(40, 5, 'Precio/Dia', 0, 1, 'C');    

    $precio_subtotal = 0; // variable para almacenar el subtotal
    $y = 110; // variable para la posición top desde la cual se empezarán a agregar los datos
    $indice = 0;

while( $indice <= count($datos) - 1){

    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(45, $y);
    $pdf->Cell(40, 5, $datos[$indice], 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $datos[$indice+1].EURO, 0, 1, 'C');
    $indice = $indice+2;
    $y = $y + 5;
}

$precio_subtotal = 100;

$pdf->Ln(6);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 5, "Total dias: "."6", 0, 1, "C");
$pdf->Cell(190, 5, "TOTAL: "."$precio_subtotal".EURO, 0, 1, "C");
$pdf->Output($archivo_de_salida);//cierra el objeto pdf
$content = $pdf->Output('../../doc.pdf','F');


//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminación del archivo en el servidor
unlink($archivo);
}