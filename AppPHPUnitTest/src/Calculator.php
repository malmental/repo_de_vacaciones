<?php

namespace AppPHPUnitTest;

class Calculator
{
    public function sumar(int $num1, int $num2): int
    {
        return $num1 + $num2;
    }

    public function restar(int $num1, int $num2): int
    {
        return $num1 - $num2;
    }

    public function multiplicar(int $num1, int $num2): int
    {
        return $num1 * $num2;
    }

    public function dividir(int $num1, int $num2): int
    {
        if ($num2 === 0) {
            throw new \InvalidArgumentException("No puedes dividir por cero");
        }

        return $num1 / $num2;
    }
}