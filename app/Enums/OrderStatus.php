<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static COMPLETED()
 */
final class OrderStatus extends Enum
{
    const PENDING =   'pending';
    // const FULFILLED = 'fulfilled';
    const COMPLETED =   'completed';
}
