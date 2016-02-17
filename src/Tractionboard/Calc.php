<?php

namespace Tractionboard;

class Calc
{
    public function add($numbers)
    {
        if(empty($numbers)) return 0;

        $separators = [",", "\n"];

        if(self::customDelimiter($numbers)) $separators[] = $numbers[2];

        $numbers = preg_split("/" .implode('|', $separators). "/", $numbers);

        return array_sum($numbers);
    }

    private static function customDelimiter($numbers)
    {
        return substr($numbers, 0,2) == '//';
    }
}
