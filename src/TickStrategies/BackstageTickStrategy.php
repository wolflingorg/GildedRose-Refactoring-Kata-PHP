<?php

namespace TickStrategies;

class BackstageTickStrategy implements TickStrategyInterface
{
    /**
     * @inheritdoc
     */
    public function handle(\Item $item)
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
}