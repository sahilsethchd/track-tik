<?php


namespace App\Lib;

use App\Lib\Interfaces\ElectronicItemInterface;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Class ElectronicItem
 * @package App\Lib
 */
class ElectronicItem implements ElectronicItemInterface
{
    /**
     * @var float $price
     */
    private $price;

    /**
     * @var static $type
     */
    private $type;

    /**
     * @var bool $isWired
     */
    private $isWired;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';

    const SORTING_FIELDS_PRICE = 'price';
    const SORTING_FIELDS_TYPE = 'type';
    const SORTING_FIELDS_EXTRAS = 'extras';

    const TRANSFORM_SORTING_FIELD_FUNCTION_NAME = [
        self::SORTING_FIELDS_PRICE => 'getPrice',
        self::SORTING_FIELDS_TYPE => 'getType',
        self::SORTING_FIELDS_EXTRAS => 'getExtras'
    ];

    public static $Types = [
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_CONTROLLER
    ];

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = strtolower($type);
    }

    /**
     * @return bool
     */
    public function getIsWired(): bool
    {
        return $this->isWired;
    }

    /**
     * @param bool $isWired
     */
    public function setIsWired(bool $isWired): void
    {
        $this->isWired = $isWired;
    }

}
