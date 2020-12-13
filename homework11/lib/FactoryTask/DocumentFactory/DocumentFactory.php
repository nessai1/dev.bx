<?php

include_once(__DIR__.'/../Document/Document.php');

abstract class DocumentFactory
{
    protected $text;

    abstract public function createDocument(): Document;

    public function __construct(string $text)
    {
        $this->text = $text;
    }
}