<?php

namespace spec\App\Service;

use App\Service\BonusDayCalculator;
use App\Service\CsvHandler;
use App\Service\PayDayGenerator;
use App\Service\SalaryDayCalculator;
use PhpSpec\ObjectBehavior;

class PayDayGeneratorSpec extends ObjectBehavior
{
    function let(SalaryDayCalculator $salaryDayCalculator, BonusDayCalculator $bonusDayCalculator, CsvHandler $csvHandler)
    {
        $this->beConstructedWith($salaryDayCalculator, $bonusDayCalculator, $csvHandler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PayDayGenerator::class);
    }

}
