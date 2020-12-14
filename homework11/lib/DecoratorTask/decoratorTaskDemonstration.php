<?php

include_once('Shapes/ShapeDecorators/RedShapeDecorator.php');
include_once('Shapes/Circle.php');
include_once('Shapes/Square.php');

$redSquare = new RedShapeDecorator(new Square());
$redSquare->draw();

$redCircle = new RedShapeDecorator(new Circle());
$redCircle->draw();



/*
	Необходимо воспользоваться шаблоном проектирования "Декоратор" для того, чтобы иметь возможность
	"получать" в итоге фигуры разных цветов, например вызов декоратора:
	$redShape->draw();
	должен вывести:
	"Red colored Shape Square" либо "Red colored Shape Circle"
	в зависимости от того, какую фигуру мы оборачиваем декоратором.
 */

