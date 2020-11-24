<?php

/*
 * Демонстрация работы тестов и решения
 */

//require('testingScript.php');
require('demoScript.php');

Logger::message("Задача #2");

queen_TEST(); // тест ферзя
rook_TEST(); // тест ладьи


if (isset($argv[1]))
{
    Logger::title("Демонстрация работы скрипта");
}
else
{
    Logger::message('');
    Logger::message("Для демонстрации решения задачи задайте один обязательный аргумент:");
    Logger::message("1. queen - задача с ферезем");
    Logger::message("2. rook - задача с ладьей");
}

if ($argv[1] == 'rook')
{
    executeExample(USE_ROOK);
}
elseif ($argv[1] == 'queen')
{
   executeExample(USE_QUEEN);
}
