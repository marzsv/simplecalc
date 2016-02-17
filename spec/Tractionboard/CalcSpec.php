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

    function it_should_accept_new_line_char_as_separator()
    {
        $this->add("1\n2,3")->shouldReturn(6);
    }

    function it_should_accept_any_char_as_separator()
    {
        $this->add("//;\n1;2")->shouldReturn(3);
    }

    function it_should_return_an_exception_with_negative_numbers()
    {
        $this->shouldThrow('\Exception')->duringAdd('1,-2');
    }

    function it_should_ignore_numbers_bigger_than_1000()
    {
        $this->add('1,3,1000,1001')->shouldReturn(1004);
    }
}
