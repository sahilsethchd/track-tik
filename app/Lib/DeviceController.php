<?php


namespace App\Lib;

/**
 * Class DeviceController
 * @package App\Lib
 */
class DeviceController extends ElectronicItem
{
    /**
     * Controller constructor.
     * @param float $price
     * @param bool $isWired
     */
    public function __construct(float $price, bool $isWired)
    {
        $this->setPrice($price);
        $this->setIsWired($isWired);
        $this->setType('controller');
    }

    /**
     * @return int
     */
    public function getNumberOfExtras(): int
    {
        return 0;
    }

}
