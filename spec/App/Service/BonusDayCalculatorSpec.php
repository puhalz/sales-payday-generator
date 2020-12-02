<?php

declare(strict_types=1);

namespace spec\App\Service;

use App\Service\BonusDayCalculator;
use PhpSpec\ObjectBehavior;

class BonusDayCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BonusDayCalculator::class);
    }

    function it_can_return_correct_bonus_day_on_non_weekend()
    {
        $this->getBonusDayOfMonth('2020', 1)->shouldBe('15-01-2020');
    }

    function it_can_return_correct_bonus_day_on_saturday()
    {
        $this->getBonusDayOfMonth('2015', 8)->shouldBe('19-08-2015');
    }

    function it_can_return_correct_bonus_day_on_sunday()
    {
        $this->getBonusDayOfMonth('2015', 2)->shouldBe('18-02-2015');
    }
}
