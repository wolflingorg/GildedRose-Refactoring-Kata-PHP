<?php

/**
 * Gilded Rose Refactoring Kata
 *
 * @see https://github.com/emilybache/GildedRose-Refactoring-Kata
 */
class GildedRose
{
    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @var Item[]
     */
    private $items = [];

    /**
     * @param $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }



    /**
     * Updates quality and sellIn for Item
     */
    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $this->tickItem($item);
        }
    }

    /**
     * @param Item $item
     */
    private function tickItem(Item $item)
    {
        if ($item->name == self::AGED_BRIE) {
            if ($item->quality < 50) {
                $item->quality = $item->quality + 1;
            }
        }

        if ($item->name == self::BACKSTAGE) {
            if ($item->quality < 50) {
                $item->quality = $item->quality + 1;
                if ($item->sellIn < 11) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
                if ($item->sellIn < 6) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }

        if ($item->name != self::AGED_BRIE && $item->name != self::BACKSTAGE && $item->name != self::SULFURAS) {
            if ($item->quality > 0) {
                $item->quality = $item->quality - 1;
            }
        }

        if ($item->name != self::SULFURAS) {
            $item->sellIn = $item->sellIn - 1;
        }

        if ($item->sellIn < 0) {
            if ($item->name == self::AGED_BRIE) {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
            }

            if ($item->name == self::BACKSTAGE) {
                $item->quality = $item->quality - $item->quality;
            }

            if ($item->name != self::AGED_BRIE && $item->name != self::BACKSTAGE && $item->name != self::SULFURAS) {
                if ($item->quality > 0) {
                    $item->quality = $item->quality - 1;
                }
            }
        }
    }
}
