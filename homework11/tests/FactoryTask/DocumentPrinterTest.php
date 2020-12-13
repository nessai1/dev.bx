<?php

use \PHPUnit\Framework\TestCase;
include_once(__DIR__.'/../../lib/FactoryTask/DocumentPrinter.php');

class DocumentPrinterTest extends TestCase
{
    public function testTypeException() : void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Wrong type in argument');

        DocumentPrinter::print('blablabla', 'testMessage');
    }

    public function testPdfOutput() : void
    {
        $message = 'Hello world';
        $this->expectOutputString("PdfDocument: {$message}\n");

        DocumentPrinter::print('pdf', $message);
    }

    public function testTextOutput() : void
    {
        $message = 'Goodbye world';
        $this->expectOutputString("TextDocument: {$message}\n");

        DocumentPrinter::print('text', $message);
    }
}