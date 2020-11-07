<?php

require_once('readerComponent.php');
require_once('assertComponent.php');

/* Проверяем ввод через аргумент */
assertComponent(true,readFromConsole('','true'), "readFromConsole('','true') = true ");
assertComponent(false,readFromConsole('','false'), "readFromConsole('','false') = false ");
assertComponent(null,readFromConsole('','!stop'), "readFromConsole('','!stop') = null ");
assertComponent(1.3,readFromConsole('','1.3'), "readFromConsole('','1.3') = 1.3 ");
assertComponent(1,readFromConsole('','1'), "readFromConsole('','1') = 1 ");
assertComponent('test',readFromConsole('','test'), "readFromConsole('','test') = test ");


/* Проверяем ввод из стандартного потока */
$q = readFromConsole('STDIN test, enter some message: ');
echo "Your message '{$q}' \n";

