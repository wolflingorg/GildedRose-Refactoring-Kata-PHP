<?php

use \TickStrategies\TickStrategyInterface;

class Item
{
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
     * @var TickStrategyInterface
     */
    private $strategy;

    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     * @param TickStrategyInterface $strategy
     */
    public function __construct($name, $sellIn, $quality, TickStrategyInterface $strategy)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
        $this->strategy = $strategy;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    /**
     * Updates quality and sellIn for Item
     */
    public function tick()
    {
        $this->strategy->handle($this);
    }
}
