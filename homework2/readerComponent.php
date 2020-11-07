<?php

/*
 *  Функция реализующая считывание файла с консоли
 */

function readFromConsole($message = '', $arg = '') // если режим считывания
{
    echo $message;
    if ($arg == '') { // если второго аргумента нет -> читаем с консоли
        $console = STDIN;
        return trim(fgets($console)); // считали строчку и удалили пробелы
    }
    else { // если в функцию подаются аргументы - отталкиваемся от второго аргумента

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
}

