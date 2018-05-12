<?php

class AgedBrieItem extends AbstractItem
{
    protected $name = 'Aged Brie';

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
        $this->quality += 1;
        $this->sellIn -= 1;

        if ($this->sellIn < 0) {
            $this->quality += 1;
        }

        $this->quality = ($this->quality < 50) ? $this->quality : 50;
    }
}