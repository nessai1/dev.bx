<?php

include_once(__DIR__.'/Document.php');

class PdfDocument implements Document
{
    protected $text;

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function print(): void
    {
        echo "PdfDocument: {$this->text}\n";
    }
}