<?php

use PHPUnit\Framework\TestCase;
use \TickStrategies\NormalTickStrategy;
use \TickStrategies\AgedBrieTickStrategy;
use \TickStrategies\BackstageTickStrategy;
use \TickStrategies\SulfurasTickStrategy;

class ItemTest extends TestCase
{
    /**
     * @return array
     */
    public function itemsDataProvider()
    {
        $quality = 10;

        return [
            // Sulfuras, Hand of Ragnaros
            [new Item("Sulfuras, Hand of Ragnaros", 10, $quality, new SulfurasTickStrategy()), $quality],
            [new Item("Sulfuras, Hand of Ragnaros", 0, $quality, new SulfurasTickStrategy()), $quality],
            [new Item("Sulfuras, Hand of Ragnaros", -10, $quality, new SulfurasTickStrategy()), $quality],

            // Aged Brie
            [new Item("Aged Brie", 10, $quality, new AgedBrieTickStrategy()), $quality + 1],
            [new Item("Aged Brie", 0, $quality, new AgedBrieTickStrategy()), $quality + 2],
            [new Item("Aged Brie", -10, $quality, new AgedBrieTickStrategy()), $quality + 2],

            // Backstage passes to a TAFKAL80ETC concert
            [new Item("Backstage passes to a TAFKAL80ETC concert", 30, $quality, new BackstageTickStrategy()), $quality + 1],
            [new Item("Backstage passes to a TAFKAL80ETC concert", 10, $quality, new BackstageTickStrategy()), $quality + 2],
            [new Item("Backstage passes to a TAFKAL80ETC concert", 5, $quality, new BackstageTickStrategy()), $quality + 3],
            [new Item("Backstage passes to a TAFKAL80ETC concert", 0, $quality, new BackstageTickStrategy()), 0],
            [new Item("Backstage passes to a TAFKAL80ETC concert", -10, $quality, new BackstageTickStrategy()), 0],

            // Normal
            [new Item("Normal", 30, $quality, new NormalTickStrategy()), $quality - 1],
            [new Item("Normal", 0, $quality, new NormalTickStrategy()), $quality - 2],
            [new Item("Normal", -10, $quality, new NormalTickStrategy()), $quality - 2],
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
            // Sulfuras, Hand of Ragnaros
            [$days, new Item("Sulfuras, Hand of Ragnaros", 10, $quality, new SulfurasTickStrategy()), $quality],
            [$days, new Item("Sulfuras, Hand of Ragnaros", 0, $quality, new SulfurasTickStrategy()), $quality],
            [$days, new Item("Sulfuras, Hand of Ragnaros", -10, $quality, new SulfurasTickStrategy()), $quality],

            // Aged Brie
            [$days, new Item("Aged Brie", 10, $quality, new AgedBrieTickStrategy()), $quality + 1 * $days],
            [$days, new Item("Aged Brie", 0, $quality, new AgedBrieTickStrategy()), $quality + 2 * $days],
            [$days, new Item("Aged Brie", -10, $quality, new AgedBrieTickStrategy()), $quality + 2 * $days],

            // Backstage passes to a TAFKAL80ETC concert
            [$days, new Item("Backstage passes to a TAFKAL80ETC concert", 30, $quality, new BackstageTickStrategy()), $quality + 1 * $days],
            [$days, new Item("Backstage passes to a TAFKAL80ETC concert", 10, $quality, new BackstageTickStrategy()), $quality + 2 * $days],
            [$days, new Item("Backstage passes to a TAFKAL80ETC concert", 5, $quality, new BackstageTickStrategy()), $quality + 3 * $days],
            [$days, new Item("Backstage passes to a TAFKAL80ETC concert", 0, $quality, new BackstageTickStrategy()), 0],
            [$days, new Item("Backstage passes to a TAFKAL80ETC concert", -10, $quality, new BackstageTickStrategy()), 0],

            // Normal
            [$days, new Item("Normal", 30, $quality, new NormalTickStrategy()), $quality - 1 * $days],
            [$days, new Item("Normal", 0, $quality, new NormalTickStrategy()), $quality - 2 * $days],
            [$days, new Item("Normal", -10, $quality, new NormalTickStrategy()), $quality - 2 * $days],
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

        $this->assertEquals($expected, $item->quality);
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

        $this->assertEquals($expected, $item->quality);
    }
}