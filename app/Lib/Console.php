<?php


namespace App\Lib;

/**
 * Class Console
 * @package App\Lib
 */
class Console extends ElectronicItem
{

    const NUM_OF_MAX_EXTRAS = 4;

    /**
     * @var array $extras
     */
    private $extras = [];

    /**
     * Console constructor.
     * @param float $price
     * @param bool $isWired
     */
    public function __construct(float $price, bool $isWired)
    {
        $this->setPrice($price);
        $this->setIsWired($isWired);
        $this->setType('console');
    }

    /**
     * @param ElectronicItem $item
     * @throws \Exception
     */
    public function addExtra(ElectronicItem $item): void
    {
        if ($this->getNumberOfExtras() >= static::NUM_OF_MAX_EXTRAS) {
            throw new \Exception('Max Extras limit exceeded');
        }
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
