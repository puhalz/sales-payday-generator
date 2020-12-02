<?php

namespace spec\App\Command;

use App\Command\SalesPaydayCommand;
use App\Service\PayDayGenerator;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Command\Command;

class SalesPaydayCommandSpec extends ObjectBehavior
{
    function let(PayDayGenerator $payDayGenerator)
    {
        $this->beConstructedWith($payDayGenerator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SalesPaydayCommand::class);
    }

    function it_is_a_command()
    {
        $this->shouldImplement(Command::class);
    }

    function it_has_a_command_name()
    {
        $this->getName()->shouldBe('app:sales:payday');
    }
}
