<?php

namespace Tractionboard;

class Calc
{
    public function add($numbers)
    {
        $total = 0;
        $separators = [",", "\n"];

        if(self::customDelimiter($numbers)) $separators[] = $numbers[2];

        $numbers = preg_split("/" .implode('|', $separators). "/", $numbers);

        foreach($numbers as $number)
        {
            $number = (int) $number;

            if($number < 0)
            {
                throw new \Exception('negatives not allowed');
            }
            elseif ($number > 1000) {
                continue;
            }

            $total += $number;
        }

        return $total;
    }

    private static function customDelimiter($numbers)
    {
        return substr($numbers, 0,2) == '//';
    }

    private static function isValid()
    {

    }
}
