<?php

include_once(__DIR__.'/../Shape.php');

abstract class ShapeDecorator implements Shape
{
    protected $shape;

    public function __construct(Shape $shape)
    {
        $this->shape = $shape;
    }

    public function draw(): void
    {
        $this->shape->draw();
    }
}