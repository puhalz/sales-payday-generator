<?php

declare(strict_types=1);

namespace App\Service;

use App\Util\DateUtilInterface;

class SalaryDayCalculator implements DateUtilInterface
{
    public function getSalaryDayOfMonth($year, $month): string
    {
        $date = new \DateTimeImmutable(sprintf('%s-%s-01', $year, $month));

        $dateString = strtotime($date->format(self::DATE_FORMAT_LAST_DAY));

        $minusDays = 0;

        if (self::SATURDAY === (int)date('w', $dateString)) {
            $minusDays = self::MINUS_ONE_DAY_IF_SATURDAY;
        }

        if (self::SUNDAY === (int)date('w', $dateString)) {
            $minusDays = self::MINUS_TWO_DAYS_IF_SUNDAY;
        }

        return date(self::DATE_FORMAT, strtotime(sprintf('-%s days', $minusDays), $dateString));

    }

}