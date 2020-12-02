<?php

namespace App\Command;

use App\Exception\InvalidInputException;
use App\Service\PayDayGenerator;
use App\Util\DateUtilInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SalesPaydayCommand extends Command
{
    private $payDayGenerator;

    protected static $defaultName = 'app:sales:payday';


    public function __construct(PayDayGenerator $payDayGenerator)
    {
        $this->payDayGenerator = $payDayGenerator;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Sales Payday for a given year')
            ->addArgument('year', InputArgument::REQUIRED, 'PayDay Generation Year');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if (4 !== strlen($input->getArgument('year'))) {
            throw InvalidInputException::forYear($input->getArgument('year'));
        }

        $payDays = $this->payDayGenerator->generateSalesPayDayReport($input->getArgument('year'));

        $io->success(sprintf('Generated the Sales Payday for year %s in a csv', $input->getArgument('year')));

        //Output the same in terminal
        $payDayRecords = [];
        for ($i = 1; $i <= DateUtilInterface::NO_OF_MONTHS; $i++) {
            array_push($payDayRecords, $payDays[$i]);
        }
        $io->table($payDays[0], $payDayRecords);

        return 0;
    }
}

