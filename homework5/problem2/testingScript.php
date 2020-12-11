<?php

/*
 * Тесты на классы, релизующие задачи
 */

require('Queen.php');
require('Rook.php');
require('../assertComponent.php');

function queen_TEST()
{
    Logger::title('Тестирование Ферзя');

    $queen = new Queen(1,1);
    assertComponent(true,$queen->validateMove(3,3), "[Test 1]: перемещение с (1,1) на (3,3) возможно ");
    assertComponent(true,$queen->validateMove(4,1), "[Test 2]: перемещение с (1,1) на (4,1) возможно ");
    assertComponent(true,$queen->validateMove(1,4), "[Test 3]: перемещение с (1,1) на (1,4) возможно ");
    assertComponent(false,$queen->validateMove(9,9), "[Test 4]: перемещение с (1,1) на (9,9) невозможно т.к. ферзь выйдет за доску ");
    assertComponent(false,$queen->validateMove(1,1), "[Test 5]: перемешение на одном месте невозможно ");
    $queen->setCoords(3, 2);
    assertComponent(true, $queen->validateMove(2,1), "[Test 6]: перемещение с (3,2) на (2,1) возможно ");
    assertComponent(true, $queen->validateMove(3,1), "[Test 7]: перемещение с (3,2) на (3,1) возможно ");
    assertComponent(true, $queen->validateMove(2,2), "[Test 8]: перемещение с (3,2) на (2,2) возможно ");
    assertComponent(true, $queen->validateMove(4,1), "[Test 9]: перемещение с (3,2) на (4,1) возможно ");
    assertComponent(true, $queen->validateMove(2,3), "[Test 10]: перемещение с (3,2) на (2,3) возможно ");
    assertComponent(true, $queen->validateMove(4,3), "[Test 11]: перемещение с (3,2) на (4,3) возможно ");
    assertComponent(false, $queen->validateMove(5,3), "[Test 12]: перемещение с (3,2) на (5,3) невозможно ");
    unset($queen);
}


function rook_TEST()
{
    Logger::title('Тестирование Ладьи');

    $rook = new Rook(1,1);
    assertComponent(true, $rook->validateMove(5,1), "[Test 1]: перемещение с (1,1) на (5,1) возможно ");
    assertComponent(true, $rook->validateMove(1,5), "[Test 2]: перемещение с (1,1) на (1,5) возможно ");
    assertComponent(false, $rook->validateMove(5,5), "[Test 3]: перемещение с (1,1) на (5,5) невозможно ");
    assertComponent(false, $rook->validateMove(9,1), "[Test 4]: перемещение с (1,1) на (9,1) невозможно т.к. ладья выйдет за доску ");
    assertComponent(false, $rook->validateMove(1,1), "[Test 5]: перемещение на одном месте невозможно ");
    $rook->setCoords(3,3);
    assertComponent(true, $rook->validateMove(2,3), "[Test 6]: перемещение с (3,3) на (2,3) возможно ");
    assertComponent(true, $rook->validateMove(3,2), "[Test 7]: перемещение с (3,3) на (3,2) возможно ");
    unset($rook);
}


