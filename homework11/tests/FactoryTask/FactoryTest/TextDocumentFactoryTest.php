<?php

use \PHPUnit\Framework\TestCase;
include_once(__DIR__.'/../../../lib/FactoryTask/DocumentFactory/TextDocumentFactory.php');

class PdfDocumentFactoryTest extends TestCase
{
    public function testObjectEqual() : void
    {
        $textDocument = new TextDocument('Hello world'); // simple create

        $textDocumentFactory = new TextDocumentFactory('Hello world'); // factory create

        self::assertEquals($textDocument, $textDocumentFactory->createDocument());
    }

    public function testObjectUnequal() : void
    {

        $textDocument = new TextDocument('Goodbye world'); // simple create

        $textDocumentFactory = new TextDocumentFactory('Hello world'); // factory create

        self::assertNotEquals($textDocument, $textDocumentFactory->createDocument());
    }
}