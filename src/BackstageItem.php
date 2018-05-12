<?php

class BackstageItem extends AbstractItem
{
    protected $name = 'Backstage passes to a TAFKAL80ETC concert';

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

        if ($this->sellIn < 11) {
            $this->quality += 1;
        }

        if ($this->sellIn < 6) {
            $this->quality += 1;
        }

        $this->quality = ($this->quality < 50) ? $this->quality : 50;

        $this->sellIn -= 1;

        $this->quality = ($this->sellIn > 0) ? $this->quality : 0;
    }
}