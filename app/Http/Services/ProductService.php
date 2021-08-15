<?php

namespace App\Http\Services;

use App\Http\Repository\ProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {
    }

    /**
     * @param string $category
     */
    public function getProductByCategory(string $category)
    {
        return $this->productRepository->getByCategory($category);
    }
}
