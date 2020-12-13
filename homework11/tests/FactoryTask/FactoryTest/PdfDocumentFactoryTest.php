<?php

use \PHPUnit\Framework\TestCase;
include_once(__DIR__.'/../../../lib/FactoryTask/DocumentFactory/PdfDocumentFactory.php');

class TextDocumentFactoryTest extends TestCase
{
    public function testObjectEqual() : void
    {
        $pdfDocument = new PdfDocument();
        $pdfDocument->setText("Hello world"); // simple create

        $pdfFactory = new PdfDocumentFactory("Hello world"); // factory create

        self::assertEquals($pdfDocument, $pdfFactory->createDocument());
    }

    public function testObjectUnequal() : void
    {
        $pdfDocument = new PdfDocument();
        $pdfDocument->setText("Goodbye world");

        $pdfFactory = new PdfDocumentFactory("Hello world");

        self::assertNotEquals($pdfFactory, $pdfDocument);
    }

    public function testObjectEqualAfterChange() : void
    {
        $pdfDocument = new PdfDocument();
        $pdfDocument->setText("Goodbye world");

        $pdfFactory = new PdfDocumentFactory("Hello world");
        $pdfDocumentFromFactory = $pdfFactory->createDocument();

        self::assertNotEquals($pdfDocumentFromFactory, $pdfDocument);

        $pdfDocumentFromFactory->setText("Goodbye world");
        self::assertEquals($pdfDocumentFromFactory, $pdfDocument);
    }
}