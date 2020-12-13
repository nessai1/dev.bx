<?php

include_once(__DIR__.'/DocumentFactory/TextDocumentFactory.php');
include_once(__DIR__.'/DocumentFactory/PdfDocumentFactory.php');

class DocumentPrinter
{
    public static function print(string $type, string $text) : void
    {
        if ($type === 'text')
        {
            $factory = new TextDocumentFactory($text);
        }
        elseif ($type === 'pdf')
        {
            $factory = new PdfDocumentFactory($text);
        }
        else
        {
            throw new InvalidArgumentException('Wrong type in argument');
        }

        $document = $factory->createDocument();
        $document->print();
    }
}