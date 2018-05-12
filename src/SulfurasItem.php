<?php

class SulfurasItem extends AbstractItem
{
    protected $name = 'Sulfuras, Hand of Ragnaros';

    /**
     * @param $sellIn
     * @param $quality
     */
    public function __construct($sellIn, $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    /**
     * @inheritdoc
     */
    public function tick()
    {
    }
}