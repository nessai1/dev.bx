<?php

/*
 *  Функция реализующая считывание файла с консоли
 */
require_once('assertComponent.php');

function readFromConsole($message = '', $arg = null) // если режим считывания
{
    echo $message;
    if (!isset($arg)) { // если второго аргумента нет -> читаем с консоли
        $console = STDIN;
        $arg = trim(fgets($console)); // считали строчку и удалили пробелы

    }

    // обработка аргумента

    if ($arg === 'true') {
        return true;
    }
    elseif ($arg === 'false') {
        return false;
    }

    if ($arg[0] === '!') {
        return null;
    }

    if (is_numeric($arg)) {
        $dot = strstr($arg, '.',true); // если в числе есть точка - возвращаем float
        if (strlen($dot)) {
            return (float)$arg;
        }
        else {
            return (int)$arg;
        }
    }

    return (string)$arg;
}

function readFromConsole_TEST() {
    assertComponent(true,readFromConsole('','true'), "readFromConsole('','true') = true ");
    assertComponent(false,readFromConsole('','false'), "readFromConsole('','false') = false ");
    assertComponent(null,readFromConsole('','!stop'), "readFromConsole('','!stop') = null ");
    assertComponent(1.3,readFromConsole('','1.3'), "readFromConsole('','1.3') = 1.3 ");
    assertComponent(1,readFromConsole('','1'), "readFromConsole('','1') = 1 ");
    assertComponent('test',readFromConsole('','test'), "readFromConsole('','test') = test ");
}

if($argv[1] == 'test') {
    readFromConsole_TEST();
}

