<?php

namespace App\Http\Services;

use App\Http\Enums\Products\ProductColumn;
use App\Http\Enums\SortDirection;
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
    public function getProductByCategory(
        string $category,
        ?string $sort = ''
    ): LengthAwarePaginator {
        if (empty($sort)) {
            return $this->productRepository->getByCategory($category);
        }

        $sortColumn = '';
        $direction = '';
        if (str_contains($sort, 'price')) {
            $sortColumn = ProductColumn::PRICE;
        } elseif (str_contains($sort, 'date')) {
            $sortColumn = ProductColumn::DEBUTED_AT;
        }

        if (str_contains($sort, 'newest') || str_contains($sort, 'highest')) {
            $direction = SortDirection::DESC;
        } elseif (str_contains($sort, 'oldest') || str_contains($sort, 'lowest')) {
            $direction = SortDirection::ASC;
        }

        return $this->productRepository->getByCategory($category, $sortColumn, $direction);
    }
}
