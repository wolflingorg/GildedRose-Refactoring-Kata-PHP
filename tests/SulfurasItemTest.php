<?php

use PHPUnit\Framework\TestCase;

class SulfurasItemTest extends TestCase
{
    /**
     * @return array
     */
    public function itemsDataProvider()
    {
        $quality = 10;

        return [
            [new SulfurasItem(10, $quality), $quality],
            [new SulfurasItem(0, $quality), $quality],
            [new SulfurasItem(-10, $quality), $quality],
        ];
    }

    /**
     * @return array
     */
    public function itemsAfterFewDaysDataProvider()
    {
        $quality = 10;
        $days = 3;

        return [
            [$days, new SulfurasItem(10, $quality), $quality],
            [$days, new SulfurasItem(0, $quality), $quality],
            [$days, new SulfurasItem(-10, $quality), $quality],
        ];
    }

    /**
     * @param NormalItem $item
     * @param int $expected
     * @dataProvider itemsDataProvider
     */
    function testQuality($item, $expected)
    {
        $item->tick();

        $this->assertEquals($expected, $item->getQuality());
    }

    /**
     * @param int $days
     * @param NormalItem $item
     * @param int $expected
     * @dataProvider itemsAfterFewDaysDataProvider
     */
    function testQualityAfterFewDays($days, $item, $expected)
    {
        foreach (range(1, $days) as $i) {
            $item->tick();
        }

        $this->assertEquals($expected, $item->getQuality());
    }
}