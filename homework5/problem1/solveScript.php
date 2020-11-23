<?php

/*
 * Функции, реализующая задачу
 */

require_once('../ReaderComponent.php');
require_once('../Logger.php');



// Функция чтения массива из консоли
function readArray()
{
    $arr = array();
    do {
        if (isset($inputLine))
        {
            if (is_int($inputLine))
            {
                $arr[] = $inputLine;
                if (count($arr) >= 20)
                {
                    break;
                }
            }
            else
            {
                Logger::message("Для ввода допустимы только натуральные числа! Повторите попытку или закончите ввод командой '!stop'!");

            }
        }
        $inputLine = ReaderComponent::readFromConsole('');
    } while ($inputLine != null);

    return $arr;
}

// Функция получения кол-ва максимальных элементов
function getMaxCount($arr) : ?int
{
    if (count($arr) === 0)
    {
        return 0;
    }
    $maxEl = max($arr);
    $result = 0;
    foreach ($arr as $buffer)
    {
        if ($buffer === $maxEl)
        {
            $result++;
        }
    }
    return $result;
}

