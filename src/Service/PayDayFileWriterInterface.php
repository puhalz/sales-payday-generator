<?php
declare(strict_types=1);

namespace App\Service;

interface PayDayFileWriterInterface
{
    public function writeToFile($year, $paydayReport): void;
}