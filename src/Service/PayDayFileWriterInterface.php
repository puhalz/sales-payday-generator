<?php
declare(strict_types=1);

namespace App\Service;

use App\Collection\PayDayCollection;

interface PayDayFileWriterInterface
{
    public function writeToFile(string $year, PayDayCollection $paydayRecords): void;
}