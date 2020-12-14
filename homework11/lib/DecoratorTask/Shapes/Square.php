<?php

include_once('Shape.php');

class Square implements Shape
{
    public function draw(): void
    {
        echo "Shape Square\n";
    }
}