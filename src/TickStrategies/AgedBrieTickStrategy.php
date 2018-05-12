<?php

namespace TickStrategies;

class AgedBrieTickStrategy implements TickStrategyInterface
{
    /**
     * @inheritdoc
     */
    public function handle(\Item $item)
    {
        $item->quality += 1;
        $item->sellIn -= 1;

        if ($item->sellIn < 0) {
            $item->quality += 1;
        }

        $item->quality = ($item->quality < 50) ? $item->quality : 50;
    }
}