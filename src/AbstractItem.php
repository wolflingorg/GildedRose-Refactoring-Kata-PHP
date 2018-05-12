<?php

abstract class AbstractItem
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $sellIn;

    /**
     * @var int
     */
    protected $quality;

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
    abstract public function tick();
}
