<?php

namespace App\Exception;

class InvalidInputException extends \RuntimeException
{
    public static function forYear(string $year)
    {
        return new self(sprintf('Invalid Year entered %d: Please enter a valid year with 4 digits', $year));
    }
}
