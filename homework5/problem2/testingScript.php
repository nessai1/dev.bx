<?php

/*
 * Тесты на классы, релизующие задачи
 */

require('solveScript.php');
require('../assertComponent.php');



function queen_TEST()
{
    Logger::title('Тестирование Ферзя');

    $queen = new Queen(1,1);
    assertComponent(true,$queen->validateMove(3,3), "[Test 1]: перемещение с (1,1) на (3,3) возможно ");
    assertComponent(true,$queen->validateMove(4,1), "[Test 2]: перемещение с (1,1) на (4,1) возможно ");
    assertComponent(false,$queen->validateMove(9,9), "[Test 3]: перемещение с (1,1) на (9,9) невозможно т.к. ферзь выйдет за доску ");
    $queen->setCoords(3, 2);
    assertComponent(true, $queen->validateMove(2,1), "[Test 4]: перемещение с (3,2) на (2,1) возможно ");
    assertComponent(false, $queen->validateMove(5,3), "[Test 5]: перемещение с (3,2) на (5,3) невозможно ");
    unset($queen);
}


function rook_TEST()
{
    Logger::title('Тестирование Ладьи');

    $rook = new Rook(1,1);
    assertComponent(true, $rook->validateMove(5,1), "[Test 1]: перемещение с (1,1) на (5,1) возможно ");
    assertComponent(false, $rook->validateMove(5,5), "[Test 2]: перемещение с (1,1) на (5,5) невозможно ");
    assertComponent(false, $rook->validateMove(9,1), "[Test 3]: перемещение с (1,1) на (9,1) невозможно т.к. ладья выйдет за доску ");
    $rook->setCoords(3,3);
    assertComponent(true, $rook->validateMove(2,3), "[Test 4]: перемещение с (3,3) на (2,3) возможно ");
    unset($rook);
}


