<?php

/*
 * Файл, с классами реалиюущюими решение задач
 */

require('../Logger.php');

interface ChessFigure
{
    public function move($x, $y);
    public function getCoords();

}

abstract class Figure implements ChessFigure
{
    protected $x;
    protected $y;
    private $name = 'Undefined figure';


    public function move($x, $y) : bool
    {
        if ($this->validateMove($x, $y))
        {
            $this->x = $x;
            $this->y = $y;
            return true;
        }

        return false;
    }

    public function getCoords()
    {
        return [$this->x, $this->y];
    }

    public function setCoords($x, $y)
    {
        if (!is_int($x) || !is_int($y))
        {
            Logger::error("(Figure) SetCoords: Попытка задать некорректные координаты, изменения не внесены.");
            return;
        }
        $this->x = $x;
        $this->y = $y;
    }


    public function validateMove($x, $y) : bool
    {
        return true;
    }

    // находится ли данная координата на шахматной доске
    protected function onField($x, $y) : bool
    {
        if ($x > 8 || $x < 1)
        {
            return false;
        }

        if ($y > 8 || $y < 1)
        {
            return false;
        }

        return true;
    }

    public function __construct($x, $y)
    {
        if (!is_int($x) || !is_int($y))
        {
            die("[Error] (Figure) Constructor: Некоторые аргументы не является целочисленными!");
        }
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString()
    {
        return "{$this->name} ({$this->x}, {$this->y})";
    }

}

class Rook extends Figure
{
    private $name = "Rook";

    public function validateMove($x, $y) : bool
    {
        if (!$this->onField($x, $y))
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

class Queen extends Figure
{
    private $name = "Queen";

    public function validateMove($x, $y) : bool
    {
        if (!$this->onField($x, $y))
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