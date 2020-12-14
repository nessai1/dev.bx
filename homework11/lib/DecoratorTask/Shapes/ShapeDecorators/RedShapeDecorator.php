<?php

include_once('ShapeDecorator.php');

class RedShapeDecorator extends ShapeDecorator
{
    public function draw() : void
    {
        echo "Red colored ";
        parent::draw();
    }
}