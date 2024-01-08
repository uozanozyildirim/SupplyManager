<?php

namespace App\Services;

use App\Data\ProductData;
use App\Repositories\ProductRepository;

class ProductService
{

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }


    public function getProduct(int $productId, int|string $storeId): ProductData
    {

        return $this->productRepository->getProductById($productId, $storeId);

    }
}
