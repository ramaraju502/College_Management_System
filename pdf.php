<?php
session_start();
include("config.php");
require __DIR__ . '/../vendor/autoload.php';
// Include Composer autoload
require 'vendor/autoload.php';

use Dompdf\Dompdf;

// ✅ Instantiate Dompdf
$dompdf = new Dompdf();

// ✅ Load HTML content
$dompdf->loadHtml('hello world');

// (Optional) Setup paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// ✅ Render HTML to PDF
$dompdf->render();

// ✅ Output PDF to browser
$dompdf->stream("sample.pdf", ["Attachment" => 0]); // Set Attachment to 1 to force download
?>
