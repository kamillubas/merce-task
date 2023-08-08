<?php
declare(strict_types=1);

use App\Order\Order;
use App\Product\Product;
use App\Utils\FileDecoder;
use Domain\Order\Processor\OrderProcessor;
use Infrastructure\Currency\Importer\CurrencyDataImporter;
use Infrastructure\Order\Importer\OrderDataImporter;
use Infrastructure\Product\Factory\ProductFactory;
use Infrastructure\Product\Importer\ProductSpecificationDataImporter;

require_once realpath("vendor/autoload.php");

$fileDecoder = new FileDecoder();
$currencyImporter = new CurrencyDataImporter($fileDecoder->decodeJsonFile("CurrencyData.json"));
$productImporter = new ProductSpecificationDataImporter(
    $fileDecoder->decodeJsonFile("TreeData.json"),
    $fileDecoder->decodeJsonFile("DecorationData.json")
);
$productFactory = new ProductFactory();
$orderProcessor = new OrderProcessor();
$product = new Product($productFactory, $productImporter);

foreach ($fileDecoder->decodeJsonFile("OrderData.json") as $orderData) {
    $orderImporter = new OrderDataImporter($orderData, $currencyImporter);
    $order = new Order($orderProcessor, $product, $orderImporter);

    if ($order->createOrder()) {
        echo PHP_EOL."Cena udekorowanego drzewka numer: ".$orderProcessor->getOrder()->getId().PHP_EOL.
            "wynosi: ".round($orderProcessor->calculateFinalPrice(), 2)." ".
            $orderProcessor->getOrder()->getCurrency()->getSymbol().PHP_EOL;
    }

}




