<?php

namespace App\Http\Controllers;

use App\Lib\Console;
use App\Lib\DeviceController;
use App\Lib\ElectronicItem;
use App\Lib\ElectronicItems;
use App\Lib\Microwave;
use App\Lib\Television;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

/**
 * Class ElectronicItemController
 * @package App\Http\Controllers
 */
class ElectronicItemController extends Controller
{
    /**
     * @var ElectronicItems $electronicItems
     */
    private $electronicItems;

    /**
     * @return JsonResponse
     */
    public function buy(): JsonResponse
    {
        $this->createScenario();

        $sortedItems = $this->electronicItems->getSortedItems('price');

        $arrItems = [];
        $totalPrice = 0;

        foreach ($sortedItems as $key => $items) {

            foreach ($items as $item) {

                $itemInfo = [
                    'type' => $item->getType(),
                    'price' => $item->getPrice(),
                    'is_wired' => $item->getIsWired()
                ];

                $totalPrice += $item->getPrice();

                if ($item->getNumberOfExtras()) {

                    foreach ($item->getExtras() as $extraItem) {

                        $itemInfo['extras'][] = [
                            'type' => $extraItem->getType(),
                            'price' => $extraItem->getPrice(),
                            'is_wired' => $extraItem->getIsWired()
                        ];

                        $totalPrice += $extraItem->getPrice();
                    }

                } else {
                    $itemInfo['extras'] = [];
                }

                if (isset($arrItems[$key])) {
                    array_push($arrItems[$key], $itemInfo);
                } else {
                    $arrItems[$key][] = $itemInfo;
                }

            }
        }

        return response()->json(['items' => $arrItems, 'total_price' => $totalPrice]);
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function costOfControllerAndConsole(): JsonResponse
    {
        try {
            $totalCost = 0;
            $this->createScenario();
            $items = $this->electronicItems->getItemsByType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
            foreach ($items as $item) {
                $totalCost += $item->getPrice();
                foreach ($item->getExtras() as $extraItem) {
                    $totalCost += $extraItem->getPrice();
                }
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return response()->json(['total_cost' => $totalCost]);

    }

    /**
     *
     */
    private function createScenario(): void
    {
        try {
            // console
            $console = new Console(100, false);

            // televisions
            $firstTelevision = new Television(300, true);
            $secondTelevision = new Television(400, true);

            // microwaves
            $microwave = new Microwave(150, true);

            // controllers
            $remoteController = new DeviceController(200, false);
            $wiredController = new DeviceController(150, true);

            // add extras
            $console->addExtra($remoteController);
            $console->addExtra($remoteController);
            $console->addExtra($wiredController);
            $console->addExtra($wiredController);

            $firstTelevision->addExtra($remoteController);
            $firstTelevision->addExtra($remoteController);

            $secondTelevision->addExtra($remoteController);

            $this->electronicItems = new ElectronicItems(
                [
                    $console,
                    $firstTelevision,
                    $secondTelevision,
                    $microwave
                ]
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

    }

}
