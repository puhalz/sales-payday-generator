<?php

namespace spec\App\Service;

use App\Service\SalaryDayCalculator;
use PhpSpec\ObjectBehavior;

class SalaryDayCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SalaryDayCalculator::class);
    }

    function it_can_return_correct_salary_day_on_non_weekend()
    {
        $this->getSalaryDayByYearMonth('2015', 4)->shouldBe('30-04-2015');
    }

    function it_can_return_correct_salary_day_on_saturday()
    {
        $this->getSalaryDayByYearMonth('2015', 1)->shouldBe('30-01-2015');
    }

    function it_can_return_correct_salary_day_on_sunday()
    {
        $this->getSalaryDayByYearMonth('2015', 5)->shouldBe('29-05-2015');
    }
}
