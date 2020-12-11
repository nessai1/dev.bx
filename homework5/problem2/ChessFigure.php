<?php

interface ChessFigure
{
    public function move($x, $y);
    public function getCoords();

}