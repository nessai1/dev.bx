<?php

/*
 *  Функция реализующая считывание файла с консоли
 */

function readFromConsole($mod = 'console', $arg = '') // если режим считывания
{
    if ($mod == 'console') { // если первый аргумент = console -> считываем с консоли и возвращаем считанную строку
        $console = STDIN;
        return trim(fgets($console)); // считали строчку и удалили пробелы
    }
    else { // если в функцию подаются аргументы - отталкиваемся от второго аргумента
        if (!isset($arg)) {
            return null;
        }

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
            $dot = strstr($arg, '.',true);
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

