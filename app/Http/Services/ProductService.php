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
     * @param string|null $sort
     * @return LengthAwarePaginator
     */
    public function getProductByCategory(string $category, ?string $sort = ''): LengthAwarePaginator
    {
        if (empty($sort)) {
            return $this->productRepository->getByCategory($category);
        }

        $sortColumn = '';
        $direction = '';
        if (str_contains($sort, 'price')) {
            $sortColumn = 'price';
        } elseif (str_contains($sort, 'date')) {
            $sortColumn = 'debuted_at';
        }

        if (str_contains($sort, 'newest') || str_contains($sort, 'highest')) {
            $direction = 'desc';
        } elseif (str_contains($sort, 'oldest') || str_contains($sort, 'lowest')) {
            $direction = 'asc';
        }

        return $this->productRepository->getByCategory($category, $sortColumn, $direction);
    }
}
