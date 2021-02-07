<?php


namespace App\Lib\Interfaces;

/**
 * Interface ElectronicItemInterface
 * @package App\Lib\Interfaces
 */
interface ElectronicItemInterface
{
    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @param float $price
     */
    public function setPrice(float $price): void;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     */
    public function setType(string $type): void;

    /**
     * @return bool
     */
    public function getIsWired(): bool;

    /**
     * @param bool $isWired
     */
    public function setIsWired(bool $isWired): void;

}
