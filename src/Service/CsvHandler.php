<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;

class CsvHandler implements PayDayFileWriterInterface
{
    const OUTPUT_DIR = '../../var/';

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function writeToFile($year, $paydayReport): void
    {
        try {
            $fp = fopen(sprintf('%s/SalesPayday_%d_%d.csv', dirname(__DIR__) . self::OUTPUT_DIR, $year, time()), 'w');

            foreach ($paydayReport as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);
        } catch (\Exception $exception) {
            $this->logger->error(
                'Unable to write the Sales pay Days to a csv file' . $exception->getMessage(),
                ['exception' => $exception]
            );

            throw new \RuntimeException('Unable to write to a csv file.' . $exception->getMessage());
        }
    }
}

