<?php
require 'pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd('mukesh_kumar', 'fcdecfe831fddbaa0ee60c7b14c99865');

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://meetuniv.com/gifted/reportpdf');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: no-cache");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"created.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $e)
{
    echo "Pdfcrowd Error: " . $e->getMessage();
}
?>