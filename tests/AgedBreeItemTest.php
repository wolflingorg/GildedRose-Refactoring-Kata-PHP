<?php

use PHPUnit\Framework\TestCase;

class AgedBreeItemTest extends TestCase
{
    /**
     * @return array
     */
    public function itemsDataProvider()
    {
        $quality = 10;

        return [
            [new AgedBrieItem( 10, $quality), $quality + 1],
            [new AgedBrieItem(0, $quality), $quality + 2],
            [new AgedBrieItem( -10, $quality), $quality + 2],
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
            [$days, new AgedBrieItem(10, $quality), $quality + 1 * $days],
            [$days, new AgedBrieItem( 0, $quality), $quality + 2 * $days],
            [$days, new AgedBrieItem(-10, $quality), $quality + 2 * $days],
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