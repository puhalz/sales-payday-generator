<?php

namespace spec\App\Exception;

use App\Exception\InvalidInputException;
use PhpSpec\ObjectBehavior;

class InvalidInputExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(InvalidInputException::class);
    }
}
