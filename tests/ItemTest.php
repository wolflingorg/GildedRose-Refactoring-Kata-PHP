<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
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

            [new AgedBrieItem( 10, $quality), $quality + 1],
            [new AgedBrieItem(0, $quality), $quality + 2],
            [new AgedBrieItem( -10, $quality), $quality + 2],

            [new BackstageItem(30, $quality), $quality + 1],
            [new BackstageItem(10, $quality), $quality + 2],
            [new BackstageItem(5, $quality), $quality + 3],
            [new BackstageItem(0, $quality), 0],
            [new BackstageItem(-10, $quality), 0],

            [new Item(30, $quality), $quality - 1],
            [new Item(0, $quality), $quality - 2],
            [new Item(-10, $quality), $quality - 2],
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

            [$days, new AgedBrieItem(10, $quality), $quality + 1 * $days],
            [$days, new AgedBrieItem( 0, $quality), $quality + 2 * $days],
            [$days, new AgedBrieItem(-10, $quality), $quality + 2 * $days],

            [$days, new BackstageItem(30, $quality), $quality + 1 * $days],
            [$days, new BackstageItem(10, $quality), $quality + 2 * $days],
            [$days, new BackstageItem(5, $quality), $quality + 3 * $days],
            [$days, new BackstageItem(0, $quality), 0],
            [$days, new BackstageItem(-10, $quality), 0],

            [$days, new Item(30, $quality), $quality - 1 * $days],
            [$days, new Item(0, $quality), $quality - 2 * $days],
            [$days, new Item(-10, $quality), $quality - 2 * $days],
        ];
    }

    /**
     * @param Item $item
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
     * @param Item $item
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