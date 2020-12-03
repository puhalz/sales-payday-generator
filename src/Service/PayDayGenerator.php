<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\PayDayCollection;
use App\Model\PayDayRecord;
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

    public function generateSalesPayDayReport($year): PayDayCollection
    {
        $payDays = new PayDayCollection();

        $payDayHeader = new PayDayRecord(self::FILE_HEADER[0], self::FILE_HEADER[1], self::FILE_HEADER[2]);
        $payDays->add($payDayHeader);

        for ($i = 1; $i <= self::NO_OF_MONTHS; $i++) {
            $payDayRecord = new PayDayRecord(
                self::MONTHS[$i],
                $this->salaryDayCalculator->getSalaryDayByYearMonth($year, $i),
                $this->bonusDayCalculator->getBonusDayByYearMonth($year, $i)
            );

            $payDays->add($payDayRecord);
        }

        $this->payDayFileWriter->writeToFile($year, $payDays);

        return $payDays;
    }
}