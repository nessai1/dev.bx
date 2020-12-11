<?php

// Класс королевы

include_once('Figure.php');

class Queen extends Figure
{
    private $name = "Queen";

    public function validateMove($x, $y) : bool
    {
        if (!$this->onField($x, $y))
        {
            return false;
        }
        if ($x == $this->x && $y == $this->y)
        {
            return false;
        }
        if ($this->x == $x || $this->y == $y || abs($x-$this->x) == abs($y-$this->y))
        {
            return true;
        }
        return false;
    }
}