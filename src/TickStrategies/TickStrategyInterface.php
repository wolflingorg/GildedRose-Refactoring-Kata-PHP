<?php

namespace TickStrategies;

interface TickStrategyInterface
{
    /**
     * Updates quality and sellIn for Item
     *
     * @param \Item $item
     *
     * @return void
     */
    public function handle(\Item $item);
}