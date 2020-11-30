<?php
//CalculatorTest.php
use \PHPUnit\Framework\TestCase;
require_once (__DIR__ . '/../lib/Calculator.php');

class CalculatorTest extends TestCase
{
	public function testAdd() : void
	{
		$calculator = new Calculator();

		self::assertEquals(4, $calculator->add(2, 2));
		self::assertEquals(-4, $calculator->add(0,-4));
		self::assertEquals(0,$calculator->add(0,0));
	}

	public function testSubtract() : void
    {
        $calculator = new Calculator();

        self::assertEquals(1,$calculator->subtract(4,3));
        self::assertEquals(-3,$calculator->subtract(0,3));
        self::assertEquals(3,$calculator->subtract(0,-3));
        self::assertEquals(8,$calculator->subtract(5,-3));
    }

    public function testMultiply() : void
    {
        $calculator = new Calculator();

        self::assertEquals(4,$calculator->multiply(2,2));
        self::assertEquals(0,$calculator->multiply(124,0));
        self::assertEquals(-6,$calculator->multiply(6,-1));
        self::assertEquals(-12,$calculator->multiply(-2,6));
        self::assertEquals(10,$calculator->multiply(-2,-5));
    }

    public function testDivideException() : void
    {
        $calculator = new Calculator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Divider cant be a zero');
        $calculator->divide(5,0);
    }

    public function testDivide() : void
    {
        $calculator = new Calculator();

        self::assertEquals(12,$calculator->divide(12,1));
        self::assertEquals(13, $calculator->divide(26,2));
        self::assertEquals(0.5,$calculator->divide(1,2));
    }

    public function testPower() : void
    {
        $calculator = new Calculator();

        self::assertEquals(8,$calculator->power(2,3));
        self::assertEquals(4,$calculator->power(16,0.5));
        self::assertEquals(-1,$calculator->power(-1,5));
        self::assertEquals(1,$calculator->power(12412,0));
        self::assertEquals(0.25,$calculator->power(4,-1));
        self::assertEquals(0.25,$calculator->power(2,-2));
    }

    public function testRootException() : void
    {
        $calculator = new Calculator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Root argument can't be negative");
        $calculator->root(-5);
    }

    public function testRoot() : void
    {
        $calculator = new Calculator();

        self::assertEquals(0.5,$calculator->root(0.25));
        self::assertEquals(8,$calculator->root(64));
        self::assertEquals(1,$calculator->root(1));
        self::assertEquals(0,$calculator->root(0));
        self::assertEquals(2,$calculator->root(4));
    }

}
