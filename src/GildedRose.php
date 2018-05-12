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
            $this->processItem($item);
        }
    }

    /**
     * @param Item $item
     *
     * @throws InvalidArgumentException
     */
    private function processItem(Item $item)
    {
        switch ($item->name) {
            case self::NORMAL:
                $this->processNormalItem($item);
                break;
            case self::AGED_BRIE:
                $this->processAgedBrieItem($item);
                break;
            case self::BACKSTAGE:
                $this->processBackstageItem($item);
                break;
            case self::SULFURAS:
                $this->processSulfurasItem($item);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Could not find handler for Item %s', $item->name));
        }
    }

    /**
     * @param Item $item
     */
    private function processNormalItem(Item $item)
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
    private function processAgedBrieItem(Item $item)
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
    private function processBackstageItem(Item $item)
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
    private function processSulfurasItem(Item $item)
    {
    }
}
