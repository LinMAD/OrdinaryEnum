<?php

namespace Tests\TestResources;

use EnumType\Enum;
use stdClass;

/**
 * Class MalusPumilaEnum
 *
 * The class represent a species "Malus pumila" in genus "Malus". The apples :)
 *
 * @package Tests\TestResources
 */
class MalusPumilaEnum extends Enum
{
    public const __default    = self::ALICE;
    public const ALICE        = 'Alice';
    public const AMBROSIA     = 'Ambrosia';
    public const GALA         = 'Gala';
    public const PACIFIC_ROSE = 'Pacific rose';
    public const SUMMERRED    = 'Summerred';


    public const BAD_APPLE = stdClass::class;
}