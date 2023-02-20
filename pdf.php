<?php 

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once __DIR__ . '/vendor/autoload.php';
  // $mpdf = new \Mpdf\Mpdf();
  $mpdf = new \Mpdf\Mpdf('utf-8', 'A4-L');
  $mpdf->WriteHTML('<h1>HOLA DESDE MI PDF</h1>');
  $mpdf->Output();
?>