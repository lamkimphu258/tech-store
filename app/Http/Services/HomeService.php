<?php

namespace App\Http\Services;

use App\Http\Enums\CategoryName;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\SalesPromotionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class HomeService
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected SalesPromotionRepository $salesPromotionRepository,
        protected ProductRepository $productRepository
    ) {
    }

    /**
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * @return Model|Builder|object|null
     */
    public function getSalesPromotion()
    {
        return $this->salesPromotionRepository->getLatest();
    }

    /**
     * @return array
     */
    public function getBestSellers(): array
    {
        $bestSellers = [];
        foreach (CategoryName::all() as $category) {
            $bestSellers[$category] = $this->productRepository->getBestSeller($category);
        }

        return $bestSellers;
    }
}
