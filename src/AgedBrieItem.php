<?php

class AgedBrieItem extends Item
{
    protected $name = 'Aged Brie';

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