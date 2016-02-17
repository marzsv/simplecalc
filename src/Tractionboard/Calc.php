<?php

namespace Tractionboard;

class Calc
{
    private $delimiters;
    private $operands;
    private $total;

    public function __construct()
    {
        $this->delimiters = [',', '\n'];
        $this->total = 0;
    }

    public function add($string)
    {
        $total = 0;

        foreach($this->operands($string) as $number)
        {
            $number = (int) $number;

            if($number < 0)
            {
                throw new \Exception('negatives not allowed');
            }
            elseif ($number > 1000)
            {
                continue;
            }

            $total += $number;
        }

        return $total;
    }

    public function operands($string)
    {
        $operands = [];
        $delimiters = $this->delimiters($string);
        $string = str_replace($delimiters, '+', $string);

        foreach(explode('+', $string) as $operand)
        {
            if(is_numeric($operand))
            {
                $operands[] = $operand;
            }
        }

        return $operands;
    }

    private function delimiters($string)
    {
        $delimiters = [];

        //if the string begins with '//['
        if(preg_match('@^\/\/\[@', $string))
        {
            //if it has multiple custom delimiters or a custom delimiter of variable length
            preg_match_all('/\[[^\[]+\]/', $string, $matches);
            foreach($matches[0] as $delimiter)
            {
                $delimiters[] = str_replace(['[', ']'], '', $delimiter);
            }
        }
        //or the string begins with '//' (just one custom delimiter)
        elseif(preg_match('@^\/\/@', $string))
        {
            $delimiterExpression = explode('\n', $string)[0];
            $delimiters[] = substr($delimiterExpression, 2);
        }

        return array_merge($delimiters, $this->delimiters);
    }
}
