<?php

declare(strict_types=1);

namespace App\Collection;

use App\Model\PayDayRecord;
use ArrayIterator;

class PayDayCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var PayDayRecord[]
     */
    private $payDays = [];

    public function __construct(array $transactions = [])
    {
        foreach ($transactions as $transaction) {
            $this->add($transaction);
        }
    }

    public function filter(callable $filter): PayDayCollection
    {
        return new self(array_filter($this->payDays, $filter));
    }

    /**
     * @return ArrayIterator
     *
     * @psalm-return ArrayIterator<array-key, Transaction>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->payDays);
    }

    public function count(): int
    {
        return \count($this->payDays);
    }

    public function add(PayDayRecord $payDay): void
    {
        $this->payDays[] = $payDay;
    }

    public function isEmpty(): bool
    {
        return 0 === \count($this->payDays);
    }

    /**
     * @return PayDayRecord[]
     */
    public function toArray(): array
    {
        return $this->payDays;
    }
}