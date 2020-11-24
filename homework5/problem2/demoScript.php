<?php

/*
 * Функция для демонстрации работы решения в отдельном файле
 */

require('testingScript.php');
require('../ReaderComponent.php');


define('USE_ROOK', 0);
define('USE_QUEEN', 1);


// Функция демонстрации решения задачи, зависящая от параметра (USE_ROOK - решение для ладьи, USE_QUEEN - ферзя)
function executeExample($useParam = USE_ROOK)
{
    if ($useParam == USE_ROOK)
    {
        $figureName = "Ладьи";
    }
    elseif ($useParam == USE_QUEEN)
    {
        $figureName = "Ферзя";
    }
    else
    {
        Logger::error("Unknown use parameter in executeExample function!");
        return;
    }

    $startCoords = readerComponent::getIntLine(
        "Через пробел введите начальные координаты (x и y) {$figureName} (два целых числа в диапозоне от 1 до 8): ",
        2);

    if ($useParam == USE_QUEEN)
    {
        $figureObject = new Queen($startCoords[0], $startCoords[1]);
    }
    else
    {
        $figureObject = new Rook($startCoords[0], $startCoords[1]);
    }

    $endCoords = ReaderComponent::getIntLine(
        "Через пробел введите конечные координаты (x и y) {$figureName} (два целых числа в диапозоне от 1 до 8): ",
        2);

    $canReach = $figureObject->validateMove($endCoords[0], $endCoords[1]);
    $result = $canReach ? 'ДА' : 'НЕТ';
    Logger::message("Result: {$result}");
}