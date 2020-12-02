<?php

declare(strict_types=1);

namespace App\Util;

interface DateUtilInterface
{
    const DATE_FORMAT_LAST_DAY = 'Y-m-t';
    const DATE_FORMAT = 'd-m-Y';

    const SATURDAY = 6;
    const SUNDAY = 0;

    const MINUS_ONE_DAY_IF_SATURDAY = 1;
    const MINUS_TWO_DAYS_IF_SUNDAY = 2;

    const NORMAL_BONUS_DAY = 15;
    const ADD_FOUR_DAYS_IF_SATURDAY = 4;
    const ADD_THREE_DAYS_IF_SUNDAY = 3;

    const NO_OF_MONTHS = 12;
    const MONTHS = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];
}