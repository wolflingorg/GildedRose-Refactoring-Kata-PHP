<?php

use PHPUnit\Framework\TestCase;

class NormalItemTest extends TestCase
{
    /**
     * @return array
     */
    public function itemsDataProvider()
    {
        $quality = 10;

        return [
            [new NormalItem('Normal', 30, $quality), $quality - 1],
            [new NormalItem('Normal', 0, $quality), $quality - 2],
            [new NormalItem('Normal', -10, $quality), $quality - 2],
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
            [$days, new NormalItem('Normal', 30, $quality), $quality - 1 * $days],
            [$days, new NormalItem('Normal', 0, $quality), $quality - 2 * $days],
            [$days, new NormalItem('Normal', -10, $quality), $quality - 2 * $days],
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