<?php


namespace App\Lib;

use App\Lib\Interfaces\ElectronicItemsInterface;

/**
 * Class ElectronicItems
 * @package App\Lib
 */
class ElectronicItems implements ElectronicItemsInterface
{

    /**
     * @var array $items
     */
    private $items = [];

    /**
     * ElectronicItems constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->addItems($items);
    }

    /**
     * @param array $items
     */
    private function addItems(array $items): void
    {
        foreach ($items as $item) {
            if ( ! $item instanceof ElectronicItem) {
                continue;
            }
            $this->items[] = $item;
        }
    }

    /**
     * Returns the items depending on the sorting type requested
     * @param $type
     * @return array
     */
    public function getSortedItems($type): array
    {
        $sortedItems = [];

        $sortingFunction = ElectronicItem::TRANSFORM_SORTING_FIELD_FUNCTION_NAME[$type]
            ?? ElectronicItem::TRANSFORM_SORTING_FIELD_FUNCTION_NAME['price'];

        foreach ($this->items as $item) {

            if (isset($sortedItems[$item->$sortingFunction()])) {
                array_push($sortedItems[$item->$sortingFunction()], $item);
            } else {
                $sortedItems[$item->$sortingFunction()][] = $item;
            }

        }
        ksort($sortedItems);

        return $sortedItems;
    }


    /**
     * @param string $type
     * @return array
     * @throws \Exception
     */
    public function getItemsByType(string $type): array
    {
        $type = strtolower($type);
        if ( ! in_array($type, ElectronicItem::$Types)) {
            throw new \Exception('This item is invalid.');
        }

        return array_filter($this->items, function ($item) use ($type) {
            return $item->getType() == $type;
        });
    }
}
