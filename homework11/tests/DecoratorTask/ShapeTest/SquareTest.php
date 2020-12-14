<?php

use \PHPUnit\Framework\TestCase;
include_once(__DIR__.'/../../../lib/DecoratorTask/Shapes/Square.php');

class SquareTest extends TestCase
{
    public function testObjectDraw() : void
    {
        $this->expectOutputString("Shape Square\n");

        $square = new Square();
        $square->draw();
    }

}