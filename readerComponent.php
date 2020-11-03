<?php

/*
 *  Функция реализующая функцию readFromConsole в отдельном файле
 */

function readFromConsole()
{
    $console = STDIN;
    return trim(fgets($console)); // считали строчку и удалили пробелы
}

