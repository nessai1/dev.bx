<?php

require_once('readerComponent.php');
//require_once('assertComponent.php');

/*  Проверяем ввод через аргумент  */

/*  Проверяем ввод из стандартного потока  */
$q = readFromConsole('STDIN test, enter some message: ');
echo "Your message '{$q}' \n";

