<?php

declare(strict_types=1);

namespace App\Service;

use App\Util\DateUtilInterface;

class BonusDayCalculator implements DateUtilInterface
{
    public function getBonusDayOfMonth($year, $month): string
    {
        $date = new \DateTimeImmutable(sprintf('%s-%s-%s', $year, $month, self::NORMAL_BONUS_DAY));
        $dateString = strtotime($date->format(self::DATE_FORMAT));

        $addDays = 0;
        if (self::SATURDAY === (int)date('w', $dateString)) {
            $addDays = self::ADD_FOUR_DAYS_IF_SATURDAY;
        }

        if (self::SUNDAY === (int)date('w', $dateString)) {
            $addDays = self::ADD_THREE_DAYS_IF_SUNDAY;
        }

        return date(self::DATE_FORMAT, strtotime(sprintf('+%s days', $addDays), $dateString));
    }
}