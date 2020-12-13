<?php

include_once(__DIR__.'/DocumentFactory.php');
include_once(__DIR__.'/../Document/TextDocument.php');

class TextDocumentFactory extends DocumentFactory
{
    public function createDocument() : Document
    {
        $textDocument = new TextDocument($this->text);
        return $textDocument;
    }
}