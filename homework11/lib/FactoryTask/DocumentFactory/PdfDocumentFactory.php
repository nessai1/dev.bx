<?php

include_once(__DIR__.'/DocumentFactory.php');
include_once(__DIR__.'/../Document/PdfDocument.php');

class PdfDocumentFactory extends DocumentFactory
{
    public function createDocument() : Document
    {
        $pdfDocument = new PdfDocument();
        $pdfDocument->setText($this->text);
        return $pdfDocument;
    }
}