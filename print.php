<?php

    require __DIR__.'/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;

    $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
    $html2pdf->writeHTML('<h1>Hello people</h1>');
    $html2pdf->output('pdf_pdf.pdf');
    
?>