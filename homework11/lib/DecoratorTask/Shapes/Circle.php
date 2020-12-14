<?php

include_once('Shape.php');

class Circle implements Shape
{
    public function draw(): void
    {
        echo "Shape Circle\n";
    }
}