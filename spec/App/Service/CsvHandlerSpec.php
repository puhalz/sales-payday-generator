<?php

namespace spec\App\Service;

use App\Service\CsvHandler;
use PhpSpec\ObjectBehavior;
use Psr\Log\LoggerInterface;

class CsvHandlerSpec extends ObjectBehavior
{
    function let(LoggerInterface $logger)
    {
        $this->beConstructedWith($logger);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CsvHandler::class);
    }
}
