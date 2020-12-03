<?php

declare(strict_types=1);

namespace App\Service;

use App\Util\DateUtilInterface;

class PayDayGenerator implements DateUtilInterface
{
    private $salaryDayCalculator;
    private $bonusDayCalculator;
    private $payDayFileWriter;

    const FILE_HEADER = ['Month', 'SalaryDay', 'BonusDay'];

    public function __construct(
        SalaryDayCalculator $salaryDayCalculator,
        BonusDayCalculator $bonusDayCalculator,
        PayDayFileWriterInterface $payDayFileWriter
    )
    {
        $this->salaryDayCalculator = $salaryDayCalculator;
        $this->bonusDayCalculator = $bonusDayCalculator;
        $this->payDayFileWriter = $payDayFileWriter;

    }

    public function generateSalesPayDayReport($year): array
    {
        $SalesPayDays [] = self::FILE_HEADER;

        for ($i = 1; $i <= self::NO_OF_MONTHS; $i++) {
            $month = self::MONTHS[$i];
            $salaryDay = $this->salaryDayCalculator->getSalaryDayByYearMonth($year, $i);
            $bonusDay = $this->bonusDayCalculator->getBonusDayByYearMonth($year, $i);

            $SalesPayDays[] = [$month, $salaryDay, $bonusDay];
        }

        $this->payDayFileWriter->writeToFile($year, $SalesPayDays);

        return $SalesPayDays;
    }
}