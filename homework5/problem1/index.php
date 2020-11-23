<?php

/*
 * Демонстрация работы тестов и решения
 */

require("../Logger.php");
require('testingScript.php');

Logger::message("Задача #1");
Logger::title("Тестирование функции getMaxCount, реализующей решение задачи #1");

getMaxCount_TEST(); // тестируем решение

Logger::message("Демонстрация работы скрипта: ");
Logger::message("Построчно вводите натуральные числа (не больше 20 чисел), для остановки ввода наберите '!stop':");

$maxCount = getMaxCount(readArray());
Logger::message("Количество максимальных чисел в введенном массиве: {$maxCount}");


