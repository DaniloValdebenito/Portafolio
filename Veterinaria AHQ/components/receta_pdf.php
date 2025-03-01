<?php
header('Content-Type: text/html; charset=utf-8');
require('../conexiones/conexion.php');
require('fpdf/fpdf.php'); 

// Obtén el ID de la receta desde la URL
$idreceta = $_GET['id'];
$horaLocal = date('Y-m-d H:i:s'); // Formato: Año-Mes-Día Hora:Minutos:Segundos

// Consulta la base de datos para obtener los detalles de la receta
$sql = "SELECT * FROM receta WHERE id = $idreceta";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    class PDF extends FPDF
    {
        private $horaLocal; // Variable para almacenar la hora local

        // Constructor que recibe la hora local como parámetro
        function __construct($horaLocal)
        {
            parent::__construct();
            $this->horaLocal = $horaLocal;
        }

        function Header()
        {
            // Ahora puedes acceder a $this->horaLocal dentro de la función Header()
            $this->SetFont('Arial', 'B', 20);
            $this->Cell(0, 10, 'RECETA VETERINARIA', 0, 1, 'C');

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(0, 10, 'Consultorio Medico No. 12345', 0, 1, 'C');
            $this->Cell(0, 10, 'Direccion: Talagante, Region Metropolitana, Chile, Cp. 98765', 0, 1, 'C');
            $this->Cell(0, 10, 'Telefono: 933276184', 0, 1, 'C');

            $this->SetFont('Arial', '', 10);
            $this->Cell(0, 10, 'Numero de Receta: 32423424233 ', 0, 1);
            $this->Cell(0, 10, 'Medico/Doctor: Aylin Herrera Quiroz  ', 0, 1);
            $this->Cell(0, 10, 'Fecha y Hora Local: ' . $this->horaLocal, 0, 1); // Usar $this->horaLocal
            $this->SetY(85);
            $this->Ln();

            $header = array("No.", "rut propietario", "paciente", "Medicamento", "dosis");
            $w = array(20, 95, 20, 25, 25);

            for ($i = 0; $i < count($header); $i++) {
                $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
            }

            $this->Ln();
        }

        function Footer()
{
    $this->SetFont('Arial', 'B', 10);
    $this->SetY(265); // Ajusta la posición hacia arriba para dar espacio al texto
    $this->Cell(0, 10, 'FIRMA Y SELLO', 0, 1, 'C');

    // Agregar la imagen de la firma
    $firmaPath = '../img/firmm.png'; // Reemplaza con la ruta de tu imagen de firma
    $this->Image($firmaPath, 85, 240, 40); // Ajusta las coordenadas y el tamaño según tus necesidades

    $this->SetFont('Arial', 'B', 10);
    $this->SetY(280); // Ajusta la posición para el texto del nombre del médico
    $this->Cell(0, 10, 'Nombre del Medico/Doctor: Aylin Herrera Quiroz', 0, 1, 'C');
}

    }

    $pdf = new PDF($horaLocal);
    $pdf->AddPage();

    $pdf->SetFont('Arial', '', 10);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(20, 6, $row['id'], 1);
    $pdf->Cell(95, 6, $row['rut'], 1);
    $pdf->Cell(20, 6, $row['paciente'], 1);
    $pdf->Cell(25, 6, $row['medicamento'], 1);
    $pdf->Cell(25, 6, $row['descripcion'], 1);
    $pdf->Ln();

    $pdf->Output();
}
?>
