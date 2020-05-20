<?php

namespace App;

class FizzBuzz
{   
    public function forNumber(int $num1) : string
    {   
        $result = "";
        $result = $num1 % 3 === 0 ? "Fizz" : "";
        $result .= $num1 % 5 === 0 ? "Buzz" : "";
        $result .= $num1 % 7 === 0 ? "Rarr" : "";
        return $result !== "" ? $result : strval($num1);
    }
}