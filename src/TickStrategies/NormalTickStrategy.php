<?php

namespace TickStrategies;

class NormalTickStrategy implements TickStrategyInterface
{
    /**
     * @inheritdoc
     */
    public function handle(\Item $item)
    {
        $item->sellIn -= 1;
        $item->quality -= 1;

        if ($item->sellIn < 0) {
            $item->quality -= 1;
        }

        $item->quality = ($item->quality >= 0) ? $item->quality : 0;
    }
}