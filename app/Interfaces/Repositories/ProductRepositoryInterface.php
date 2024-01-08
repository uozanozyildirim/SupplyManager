<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProduct();
    public function getProductById($orderId);
    public function deleteProduct($orderId);
    public function createProduct(array $orderDetails);
    public function updateProduct($orderId, array $newDetails);
}
