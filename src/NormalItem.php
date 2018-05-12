<?php

class NormalItem extends AbstractItem
{
    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     */
    public function __construct($name, $sellIn, $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    /**
     * Updates quality and sellIn for Item
     */
    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality -= 1;

        if ($this->sellIn < 0) {
            $this->quality -= 1;
        }

        $this->quality = ($this->quality >= 0) ? $this->quality : 0;
    }
}
