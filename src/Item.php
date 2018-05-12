<?php

class Item {
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sellIn;

    /**
     * @var int
     */
    public $quality;

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
     * @return string
     */
    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
