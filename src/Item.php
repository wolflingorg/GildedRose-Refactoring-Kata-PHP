<?php

class Item
{
    /**
     * @var string
     */
    protected $name = 'Normal';

    /**
     * @var int
     */
    protected $sellIn;

    /**
     * @var int
     */
    protected $quality;

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
     * @return string
     */
    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return $this->quality;
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
