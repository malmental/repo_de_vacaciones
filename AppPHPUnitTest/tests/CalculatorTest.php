<?php
namespace AppPHPUnitTest\Tests;

use PHPUnit\Framework\TestCase;
use AppPHPUnitTest\Calculator;



class CalculatorTest extends TestCase
{
    private Calculator $calculator;
    
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testSumar(): void
    {
        $resultado = $this->calculator->sumar(2, 3);
        $this->assertEquals(5, $resultado);
    }

    public function testRestar(): void
    {
        $resultado = $this->calculator->restar(6, 2);
        $this->assertEquals(4, $resultado);
    }

    public function testMultiplicar(): void
    {
        $resultado = $this->calculator->multiplicar(2, 3);
        $this->assertEquals(6, $resultado);
    }

    public function testDividir(): void
    {
        $resultado = $this->calculator->dividir(8, 2);
        $this->assertEquals(4, $resultado);
    }

}