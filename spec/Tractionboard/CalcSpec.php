<?php

namespace spec\Tractionboard;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalcSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tractionboard\Calc');
    }

    function it_should_return_zero_for_an_empty_string()
    {
        $this->add("")->shouldReturn(0);
    }

    function it_should_add_one_number()
    {
        $this->add("5")->shouldReturn(5);
    }

    function it_should_add_multiple_numbers()
    {
        $this->add("1,2,3")->shouldReturn(6);
    }
}
