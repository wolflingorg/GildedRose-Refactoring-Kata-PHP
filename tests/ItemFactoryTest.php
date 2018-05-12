<?php

use PHPUnit\Framework\TestCase;

class ItemFactoryTest extends TestCase
{
    /**
     * @return array
     */
    public function itemsDataProvider()
    {
        return [
            [["Sulfuras, Hand of Ragnaros", 0, 0], SulfurasItem::class],
            [["Aged Brie", 0, 0], AgedBrieItem::class],
            [["Backstage passes to a TAFKAL80ETC concert", 0, 0], BackstageItem::class],
            [["Normal", 0, 0], NormalItem::class],
        ];
    }

    /**
     * @param AbstractItem $data
     * @param int $expected
     * @dataProvider itemsDataProvider
     */
    function testCreate($data, $expected)
    {
        $item = ItemFactory::create(...$data);

        $this->assertInstanceOf($expected, $item);
    }
}