<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const New =   'New';
    const Processing =   'Processing';
    const WaitingForProcessingrUserConfirmation = 'WaitingForProcessingrUserConfirmation';
    const Canceled = 'Canceled';
    const Confirmed = 'Confirmed';
    const Delivered = 'Delivered';

}
