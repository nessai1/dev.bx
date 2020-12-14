<?php

use \PHPUnit\Framework\TestCase;
include_once(__DIR__.'/../../../lib/DecoratorTask/Shapes/Square.php');
include_once(__DIR__.'/../../../lib/DecoratorTask/Shapes/Circle.php');
include_once(__DIR__.'/../../../lib/DecoratorTask/Shapes/ShapeDecorators/RedShapeDecorator.php');

class RedShapeDecoratorTest extends TestCase
{
    public function testRedSquare()
    {
        $this->expectOutputString("Red colored Shape Square\n");

        $redShape = new RedShapeDecorator(new Square());
        $redShape->draw();
    }

    public function testRedCircle()
    {
        $this->expectOutputString("Red colored Shape Circle\n");

        $redShape = new RedShapeDecorator(new Circle());
        $redShape->draw();
    }

    public function testDoubleWrappedRedSquare()
    {
        $this->expectOutputString("Red colored Red colored Shape Square\n");

        $doubleRedShape = new RedShapeDecorator(new RedShapeDecorator(new Square()));
        $doubleRedShape->draw();
    }
}