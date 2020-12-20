<?php
ini_set('display_errors',true);

require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$data = array('orderId' => 79, 'deliveryOption' => 'Home-Delivery', 'costumerName'=> 'Michael Jackson', 'costumerEmail' => 'michaelJ@gmail.com', 'costumerContact' => '66419162', 'productList' => 'Orange(2)', 'paymentMode' => 'Cash', 'Kilometers' => '10', 'totalAmount' => 200);
$html = "<!DOCTYPE html>
        <html>
          <head>
          <title></title>
                  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
          </head>
          <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
         <body>";
$html = $html . '<h2>Billing Order :'. $data['orderId'] . '</h2> <table> ';
$html = $html . '<tr><th>Order Id</th><th>'. $data['orderId'] .'</th></tr>';
$html = $html . '<tr><th>Costumer Name</th><th>'. $data['costumerName'] .'</th></tr>';
$html = $html . '<tr><th>Delivery Option</th><th>'. $data['deliveryOption'] .'</th></tr>';
$html = $html . '<tr><th>Costumer Email</th><th>'. $data['costumerEmail'] .'</th></tr>';
$html = $html . '<tr><th>Costumer Contact</th><th>'. $data['costumerContact'] .'</th></tr>';
$html = $html . '<tr><th>Product List</th><th>'. $data['productList'] .'</th></tr>';
$html = $html . '<tr><th>Payment Mode</th><th>'. $data['paymentMode'] .'</th></tr>';
$html = $html . '<tr><th>Kilometers</th><th>'. $data['Kilometers'] .'</th></tr>';
$html = $html . '<tr><th>Total</th><th>'. $data['totalAmount'] .'</th></tr>';

$dompdf->loadHtml($html); 

// (Optional) Setup the paper size and orientation

// Render the HTML as PDF
$dompdf->render(); 
file_put_contents('pdfoutput.pdf',$dompdf->output());