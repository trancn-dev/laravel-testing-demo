<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();

        $result = $calculator->add(2, 3);

        $this->assertEquals(5, $result);
    }
}
