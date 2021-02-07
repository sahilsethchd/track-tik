<?php


namespace App\Lib\Interfaces;

/**
 * Interface ElectronicItemsInterface
 * @package App\Lib\Interfaces
 */
interface ElectronicItemsInterface
{

    /**
     * Returns the items depending on the sorting type requested
     * @param $type
     * @return array
     */
    public function getSortedItems($type): array;

    /**
     * Returns the items depending on the type requested
     * @param string $type
     * @return array
     * @throws \Exception
     */
    public function getItemsByType(string $type): array;

}
