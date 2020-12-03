<?php

declare(strict_types=1);

namespace App\Service;

use App\Collection\PayDayCollection;
use Psr\Log\LoggerInterface;

class CsvHandler implements PayDayFileWriterInterface
{
    const OUTPUT_DIR = '../../var/';

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function writeToFile(string $year, PayDayCollection $paydayRecords): void
    {
        try {
            $csvFile = fopen(
                sprintf('%s/SalesPayday_%d_%d.csv', dirname(__DIR__) . self::OUTPUT_DIR, $year, time()
                ), 'w');

            foreach ($paydayRecords->toArray() as $payday) {
                fputcsv($csvFile, $payday->toArray());
            }

            fclose($csvFile);
        } catch (\Exception $exception) {
            $this->logger->error(
                'Unable to write the Sales pay Days to a csv file' . $exception->getMessage(),
                ['exception' => $exception]
            );

            throw new \RuntimeException('Unable to write to a csv file.' . $exception->getMessage());
        }
    }
}

