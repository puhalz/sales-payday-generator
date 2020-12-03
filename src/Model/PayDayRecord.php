<?php

declare(strict_types=1);

namespace App\Model;

class PayDayRecord
{
    private $month;

    private $salaryDay;

    private $bonusDay;

    public function __construct($month, $salaryDay, $bonusDay)
    {
        $this->month = $month;
        $this->salaryDay = $salaryDay;
        $this->bonusDay = $bonusDay;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    public function getSalaryDay()
    {
        return $this->salaryDay;
    }

    public function setSalaryDay(string $salaryDay): void
    {
        $this->salaryDay = $salaryDay;
    }

    public function getBonusDay()
    {
        return $this->bonusDay;
    }

    public function setBonusDay(string $bonusDay): void
    {
        $this->bonusDay = $bonusDay;
    }

    public function toArray(): array
    {
        return [
            $this->month,
            $this->salaryDay,
            $this->bonusDay,
        ];
    }
}
