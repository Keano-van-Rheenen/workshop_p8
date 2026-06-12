<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;
use InvalidArgumentException;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        // Deze methode wordt vóór elke test uitgevoerd.
        // Hier maken we één keer een nieuwe Calculator aan
        // zodat elke test met een "schone" situatie begint.
        $this->calculator = new Calculator();
    }

    /* =========================
     * BASIC OPERATIONS
     * ========================= */

    public function testAdd()
    {
        // Arrange
        $a = 5;
        $b = 3;

        // Act
        $result = $this->calculator->add($a, $b);

        // Assert
        $this->assertEquals(8, $result);
    }

    /*
     * OPDRACHT:
     * Maak hieronder een test voor:
     * - optellen met negatieve getallen
     *
     * Denk aan:
     * - Arrange
     * - Act
     * - Assert
     */
    public function testAddNegative()
    {
        $a = -5;
        $b = -3;

        $result = $this->calculator->add($a, $b);

        $this->assertEquals(-8, $result);
    }

    /*
     * OPDRACHT:
     * Maak een test voor subtract().
     * Test een normale situatie (bijvoorbeeld 10 - 4).
     */
    public function testSubstract()
    {
        $a = 10;
        $b = 4;

        $result = $this->calculator->subtract($a, $b);

        $this->assertEquals(6, $result);
    }

    /*
     * OPDRACHT:
     * Maak een test voor multiply().
     * Test:
     * - een normale vermenigvuldiging
     * - vermenigvuldigen met 0
     */
    public function testMultiply()
    {
        $a = 2;
        $b = 2;

        $result = $this->calculator->multiply($a, $b);

        $this->assertEquals(4, $result);
    }
    
    public function testMultiplyWithZero()
    {
        $a = 2;
        $b = 0;

        $result = $this->calculator->multiply($a, $b);

        $this->assertEquals(0, $result);
    }

    /*
     * OPDRACHT:
     * Maak een test voor divide().
     * Test:
     * - een normale deling
     * - delen door 0 moet een InvalidArgumentException geven
     *
     * Tip voor exception test:
     * $this->expectException(InvalidArgumentException::class);
     */
    public function testDivide()
    {
        $a = 6;
        $b = 2;

        $result = $this->calculator->divide($a, $b);

        $this->assertEquals(3, $result);
    }

    public function testDivideWithZero()
    {
        $a = 6;
        $b = 0;

        $this->expectException(InvalidArgumentException::class);
        
        $this->calculator->divide($a, $b);
    }

    /* =========================
     * POWER
     * ========================= */

    /*
     * OPDRACHT:
     * Maak een test voor power().
     * Test:
     * - 2 tot de macht 3
     * - exponent 0 (uitkomst moet 1 zijn)
     */
    public function testPower()
    {
        $a = 2;
        $b = 3;

        $result = $this->calculator->power($a, $b);

        $this->assertEquals(8, $result);
    }
    
    public function testPowerWithZero()
    {
        $a = 2;
        $b = 0;

        $result = $this->calculator->power($a, $b);

        $this->assertEquals(1, $result);
    }

    /* =========================
     * PERCENTAGE
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor percentage().
     * Test:
     * - 10% van 200
     * - 0%
     * - een percentage boven de 100%
     */
    public function testPercentage()
    {
        $a = 200;
        $b = 10;

        $result = $this->calculator->percentage($a, $b);

        $this->assertEquals(20, $result);
    }
    
    public function testPercentageWithZero()
    {
        $a = 200;
        $b = 0;

        $result = $this->calculator->percentage($a, $b);

        $this->assertEquals(0, $result);
    }
    
    public function testPercentageWithAboveHundred()
    {
        $a = 200;
        $b = 110;

        $result = $this->calculator->percentage($a, $b);

        $this->assertEquals(220, $result);
    }

    /* =========================
     * AVERAGE
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor average().
     * Test:
     * - gemiddelde van 2 getallen
     * - gemiddelde van meerdere getallen
     * - lege array moet een exception geven
     */
    public function testAverage()
    {
        $a = [5, 3];

        $result = $this->calculator->average($a);

        $this->assertEquals(4, $result);
    }
    
    public function testAverageWithMultiple()
    {
        $a = [8, 5, 3, 8];

        $result = $this->calculator->average($a);

        $this->assertEquals(6, $result);
    }
    
    public function testAverageWithNone()
    {
        $a = [];

        $this->expectException(InvalidArgumentException::class);
        
        $this->calculator->average($a);
    }

    /* =========================
     * HIGHEST
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor highest().
     * Test:
     * - normale getallen
     * - negatieve getallen
     */
    public function testHighest()
    {
        $a = [10, 5, 9, 2];

        $result = $this->calculator->highest($a);

        $this->assertEquals(10, $result);
    }
    
    public function testHighestWithNegative()
    {
        $a = [-3, -6, -24, -1];

        $result = $this->calculator->highest($a);

        $this->assertEquals(-1, $result);
    }

    /* =========================
     * LOWEST
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor lowest().
     * Test:
     * - normale getallen
     * - decimalen
     */
    public function testLowest()
    {
        $a = [9, 5, 2, 10];

        $result = $this->calculator->lowest($a);

        $this->assertEquals(2, $result);
    }
    
    public function testLowestWithDecimals()
    {
        $a = [9.2, 9.7, 8.9, 6.3];

        $result = $this->calculator->lowest($a);

        $this->assertEquals(6.3, $result);
    }
}