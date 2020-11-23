<?php

/*
 * Тесты на функцию, релизующую задачу
 */

require('../assertComponent.php');
require('solveScript.php');

function getMaxCount_TEST()
{
    assertComponent(4,getMaxCount([0,3,2,5,5,1,2,5,3,5]),"[Test 1]: Ожидаемый результат = 4 ");
    assertComponent(2,getMaxCount([0,3,2,1,9,5,9,5]),"[Test 2]: Ожидаемый результат = 2 ");
    assertComponent(0,getMaxCount([]),"[Test 3]: Ожидаемый результат с пустым массивом = 0 ");
    assertComponent(6,getMaxCount([0,0,0,0,0,0]),"[Test 4]: Ожидаемый результат = 6 ");
}



