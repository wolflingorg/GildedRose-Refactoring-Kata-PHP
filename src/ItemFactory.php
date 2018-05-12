<?php

use \TickStrategies\NormalTickStrategy;
use \TickStrategies\AgedBrieTickStrategy;
use \TickStrategies\BackstageTickStrategy;
use \TickStrategies\SulfurasTickStrategy;

class ItemFactory
{
    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     *
     * @return Item
     */
    public static function create($name, $sellIn, $quality)
    {
        if (!in_array($name, array_keys(self::getConfig()))) {
            $className = NormalTickStrategy::class;
        } else {
            $className = self::getConfig()[$name];
        }

        return new Item($name, $sellIn, $quality, new $className());
    }

    /**
     * @return array
     */
    protected static function getConfig()
    {
        return [
            'Aged Brie' => AgedBrieTickStrategy::class,
            'Backstage passes to a TAFKAL80ETC concert' => BackstageTickStrategy::class,
            'Sulfuras, Hand of Ragnaros' => SulfurasTickStrategy::class,
        ];
    }
}