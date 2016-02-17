<?php

namespace Tractionboard;

class Calc
{
    public function add($numbers)
    {
        if(empty($numbers)) return 0;

        $numbers = explode(",", $numbers);

        return array_sum($numbers);
    }
}
