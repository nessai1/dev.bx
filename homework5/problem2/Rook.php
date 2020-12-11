<?php

// Класс ладьи

include_once('Figure.php');

class Rook extends Figure
{
    private $name = "Rook";

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
        if ($this->x == $x || $this->y == $y)
        {
            return true;
        }
        return false;
    }
}