<?php

/*
 * Задача оформлена в отдельный файл
 */

declare(strict_types=1);

require_once('readerComponent.php');

function getSum($arr) : float // т.к. в отработанных темах указано 'массивы' - сумма вычисляется через них
{
    $res = 0;
    foreach ($arr as $arrEl) {
        $res += $arrEl; // суммируем все элементы массива
    }
    return $res;
}

function readNumbers() {    // функция реализующая основную задачу
    echo "Enter numbers (non-number input = end of the program):\n";
    $numbers = array();
    $i = 0;
    do {
        if (isset($line)) {
            $numbers[$i] = (float)$line;
            $i++;
        }
        $line = readFromConsole();
    } while(is_numeric($line));
    if ($i == 0)
        return null;
    else
        return getSum($numbers);
}


