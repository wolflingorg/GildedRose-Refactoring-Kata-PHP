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
    const NORMAL = 'Normal';

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
     *
     * @throws InvalidArgumentException
     */
    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $this->tickItem($item);
        }
    }

    /**
     * @param Item $item
     *
     * @throws InvalidArgumentException
     */
    private function tickItem(Item $item)
    {
        switch ($item->name) {
            case self::NORMAL:
                $this->tickNormalItem($item);
                break;
            case self::AGED_BRIE:
                $this->tickAgedBrieItem($item);
                break;
            case self::BACKSTAGE:
                $this->tickBackstageItem($item);
                break;
            case self::SULFURAS:
                $this->tickSulfurasItem($item);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Could not find handler for Item %s', $item->name));
        }
    }

    /**
     * @param Item $item
     */
    private function tickNormalItem(Item $item)
    {
        $item->sellIn -= 1;
        $item->quality -= 1;

        if ($item->sellIn < 0) {
            $item->quality -= 1;
        }

        $item->quality = ($item->quality >= 0) ? $item->quality : 0;
    }

    /**
     * @param Item $item
     */
    private function tickAgedBrieItem(Item $item)
    {
        $item->quality += 1;
        $item->sellIn -= 1;

        if ($item->sellIn < 0) {
            $item->quality += 1;
        }

        $item->quality = ($item->quality < 50) ? $item->quality : 50;
    }

    /**
     * @param Item $item
     */
    private function tickBackstageItem(Item $item)
    {
        $item->quality += 1;

        if ($item->sellIn < 11) {
            $item->quality += 1;
        }

        if ($item->sellIn < 6) {
            $item->quality += 1;
        }

        $item->quality = ($item->quality < 50) ? $item->quality : 50;

        $item->sellIn -= 1;

        $item->quality = ($item->sellIn > 0) ? $item->quality : 0;
    }

    /**
     * @param Item $item
     */
    private function tickSulfurasItem(Item $item)
    {
    }
}
