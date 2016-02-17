<?php

namespace Tractionboard;

class Calc
{
    private $string;
    private $delimiters;
    private $total;

    public function __construct()
    {
        $this->delimiters = [',', '\n'];
        $this->total = 0;
    }

    public function prepare()
    {
        if(preg_match('@^\/\/\[@', $this->string))
        {
            list($a, $b) = explode('\n', $this->string);
            $this->delimiters[] = substr($a, 3,1);
        }
        elseif(preg_match('@^\/\/@', $this->string))
        {
            list($a, $b) = explode('\n', $this->string);
            $this->delimiters[] = substr($a, 2);
        }

        var_dump($this->delimiters);

        foreach($this->delimiters as $delimiter)
        {
            $this->string = str_replace($delimiter, '+', $this->string);
        }
    }

    public function add($string)
    {
        $this->string = $string;

        $this->prepare();

        foreach(explode('+', $this->string) as $number)
        {
            $number = (int) $number;

            if($number < 0)
            {
                throw new \Exception('negatives not allowed');
            }
            elseif ($number > 1000) {
                continue;
            }

            $this->total += $number;
        }

        return $this->total;
    }
}
