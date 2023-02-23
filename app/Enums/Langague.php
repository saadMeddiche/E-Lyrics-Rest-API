<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Langague extends Enum
{
    const ENGLISH = 'en';
    const SPANISH = 'es';
    const FRENCH = 'fr';
}
