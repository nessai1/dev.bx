<?php

include_once(__DIR__.'/DocumentPrinter.php');

$documentText = 'Document text here';
DocumentPrinter::print('pdf', $documentText);
DocumentPrinter::print('text', $documentText);

/*
 	Воспользуйтесь шаблоном проектирования "Фабричный метод"

	$documentText = 'Document text here';

	DocumentPrinter::print('text', $documentText);
	//TextDocument

	DocumentPrinter::print('pdf', $documentText);
	//PdfDocument
 */
