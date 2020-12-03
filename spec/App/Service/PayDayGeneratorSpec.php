<?php

namespace spec\App\Service;

use App\Service\BonusDayCalculator;
use App\Service\CsvHandler;
use App\Service\PayDayFileWriterInterface;
use App\Service\PayDayGenerator;
use App\Service\SalaryDayCalculator;
use PhpSpec\ObjectBehavior;

class PayDayGeneratorSpec extends ObjectBehavior
{
    function let(
        SalaryDayCalculator $salaryDayCalculator,
        BonusDayCalculator $bonusDayCalculator,
        PayDayFileWriterInterface $payDayFileWriter
    )
    {
        $this->beConstructedWith($salaryDayCalculator, $bonusDayCalculator, $payDayFileWriter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PayDayGenerator::class);
    }

    function test_it_can_generate_csv_file(
        SalaryDayCalculator $salaryDayCalculator,
        BonusDayCalculator $bonusDayCalculator,
        PayDayFileWriterInterface $payDayFileWriter
    )
    {
        $payDayFileWriter->writeToFile('2020', [])->shouldBeCalledOnce();
    }
}
