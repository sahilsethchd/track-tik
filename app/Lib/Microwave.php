<?php


namespace App\Lib;

/**
 * Class Microwave
 * @package App\Lib
 */
class Microwave extends ElectronicItem
{

    /**
     * Microwave constructor.
     * @param float $price
     * @param bool $isWired
     */
    public function __construct(float $price, bool $isWired)
    {
        $this->setPrice($price);
        $this->setIsWired($isWired);
        $this->setType('microwave');
    }

    /**
     * @return int
     */
    public function getNumberOfExtras(): int
    {
        return 0;
    }

}
