<?php

/*
 *  Функция реализующая считывание файла с консоли
 */

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

