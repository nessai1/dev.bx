<?php
//Calculator.php

class Calculator
{
	public function add(int $a, int $b): int
	{
		return $a + $b;
	}

	public function subtract(int $a, int $b): int
	{
		return $a - $b;
	}

	public function multiply(int $a, int $b): int
	{
		return $a * $b;
	}

	public function divide(int $a, int $b): float
	{
		if($b === 0)
		{
			throw new InvalidArgumentException('Divider cant be a zero');
		}

		return $a / $b;
	}

	public function power(float $a, float $b): float
    {
        return $a ** $b;
    }

    public function root(float $a) : float
    {
        if ($a < 0)
        {
            throw new InvalidArgumentException("Root argument can't be negative");
        }

        return sqrt($a);
    }
}