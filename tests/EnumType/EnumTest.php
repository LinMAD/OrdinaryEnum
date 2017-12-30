<?php

namespace Tests\EnumType;

use PHPUnit\Framework\TestCase;
use Tests\TestResources\MalusPumilaEnum;

class EnumTest extends TestCase
{
    public function testEnumUsageViaClassConst()
    {
        $pumila = new MalusPumilaEnum(MalusPumilaEnum::AMBROSIA);

        $this->assertEquals(
            $pumila,
            MalusPumilaEnum::AMBROSIA,
            'Expect to be const value of MalusPumilaEnum class'
        );
    }

    public function testEnumUsageViaString()
    {
        $pumila = new MalusPumilaEnum('Gala');

        $this->assertEquals(
            $pumila,
            MalusPumilaEnum::GALA,
            'Expect to be const value of MalusPumilaEnum class'
        );
    }

    /**
     * @expectedException \EnumType\Exceptions\InvalidEnumTypeException
     * @expectedExceptionMessage Value ('Avium') is not part of the enum data type in Tests\TestResources\MalusPumilaEnum
     */
    public function testEnumInvalidEnumTypeException()
    {
        new MalusPumilaEnum('Avium');
    }
}
