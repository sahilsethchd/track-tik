<?php


namespace App\Lib;


class Television extends ElectronicItem
{

    /**
     * @var array $extras
     */
    private $extras = [];

    /**
     * Television constructor.
     * @param float $price
     * @param bool $isWired
     */
    public function __construct(float $price, bool $isWired)
    {
        $this->setPrice($price);
        $this->setIsWired($isWired);
        $this->setType('television');
    }

    /**
     * @param ElectronicItem $item
     */
    public function addExtra(ElectronicItem $item): void
    {
        $this->extras [] = $item;
    }

    /**
     * @return array
     */
    public function getExtras(): array
    {
        return $this->extras;
    }

    /**
     * @return int
     */
    public function getNumberOfExtras(): int
    {
        return count($this->extras);
    }
}
