<?php

/*
 *  Функция реализующая считывание файла с консоли
 */

class ReaderComponent
{
    public static function readFromConsole($message = '', $arg = null) // если режим считывания
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


    // получает строчку целых чисел и возвращает в виде массива
    public static function getIntLine($message = '', $argCount = 1)
    {
        if ($argCount < 1)
        {
            die('[Error]: Кол-во аргументов должно быть больше нуля'.PHP_EOL);
        }

        // читаем строчки пока не получим строчку состоящую только из определенного кол-ва чисел
        do {
            $wrongCount = false;
            $inputLine = self::readFromConsole($message);
            $lineArguments = explode(' ', $inputLine);
            if (count($lineArguments) != $argCount)
            {
                $wrongCount = true;
                continue;
            }

            $nonNumberExist = false;
            for ($i = 0; $i < $argCount; $i++)
            {
                if (!is_numeric($lineArguments[$i]))
                {
                    $nonNumberExist = true;
                    break;
                }
                $lineArguments[$i] = (int)$lineArguments[$i];
            }

        } while ($nonNumberExist || $wrongCount);

        return $lineArguments;
    }
}




