<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/** @property array<string,DataCollection<BadgeData>> $badgeData */
class ProductData extends Data
{

    public function __construct(
        public string     $orderCode,
        public int        $product_id,
        public int        $quantity,
        public string     $address,
        public ?string    $shippingDate = null,
    )
    {
    }
}
