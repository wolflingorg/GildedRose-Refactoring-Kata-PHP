<?php

class ItemFactory
{
    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     *
     * @return Item
     * @throws InvalidArgumentException
     */
    public static function create($name, $sellIn, $quality)
    {
        if (!in_array($name, array_keys(self::getConfig()))) {
            throw new \InvalidArgumentException(sprintf('Could not find handler for Item %s', $name));
        }

        $className = self::getConfig()[$name];

        return new $className($sellIn, $quality);
    }

    /**
     * @return array
     */
    protected static function getConfig()
    {
        return [
            'Aged Brie' => AgedBrieItem::class,
            'Backstage passes to a TAFKAL80ETC concert' => BackstageItem::class,
            'Sulfuras, Hand of Ragnaros' => SulfurasItem::class,
            'Normal' => Item::class,
        ];
    }
}