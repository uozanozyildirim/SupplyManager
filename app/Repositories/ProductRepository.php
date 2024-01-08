<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getAllProduct()
    {
        return Product::all();
    }

    /**
     * @param $orderId
     * @return mixed
     */
    public function getProductById($orderId)
    {
        return Product::findOrFail($orderId);
    }

    /**
     * @param $orderId
     * @return mixed
     */
    public function deleteProduct($orderId)
    {
        Product::destroy($orderId);
    }

    /**
     * @param array $orderDetails
     * @return mixed
     */
    public function createProduct(array $orderDetails)
    {
        return Product::create($orderDetails);
    }

    /**
     * @param $orderId
     * @param array $newDetails
     * @return mixed
     */
    public function updateProduct($orderId, array $newDetails)
    {
        return Product::whereId($orderId)->update($newDetails);
    }

}