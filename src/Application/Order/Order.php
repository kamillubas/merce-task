<?php
declare(strict_types=1);

namespace App\Order;

use App\Product\Product;
use Domain\Order\Processor\OrderProcessor;
use Exception;
use Infrastructure\Order\Importer\OrderDataImporter;

class Order
{
    private OrderProcessor $orderProcessor;
    private Product $product;
    private OrderDataImporter $orderDataImporter;
    public function __construct(
        OrderProcessor $orderProcessor,
        Product $product,
        OrderDataImporter $orderDataImporter,
    )
    {
        $this->orderProcessor = $orderProcessor;
        $this->product = $product;
        $this->orderDataImporter = $orderDataImporter;
    }
    public function createOrder(): void
    {
        $this->product->createProducts($this->orderDataImporter);
        $currency = $this->orderDataImporter->getOrderCurrency();
        try {
            $this->orderProcessor->process($this->product->getTree(), $this->product->getDecorations(), $currency);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
