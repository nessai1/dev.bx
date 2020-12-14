<?php

use \PHPUnit\Framework\TestCase;
include_once(__DIR__.'/../../../lib/DecoratorTask/Shapes/Circle.php');

class CircleTest extends TestCase
{
    public function testObjectDraw() : void
    {
        $this->expectOutputString("Shape Circle\n");

        $circle = new Circle();
        $circle->draw();
    }

}