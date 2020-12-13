<?php

include_once(__DIR__.'/Document.php');

class TextDocument implements Document
{
protected $text;

public function __construct(string $text)
{
$this->text = $text;
}

public function print(): void
{
echo "TextDocument: {$this->text}\n";
}
}
