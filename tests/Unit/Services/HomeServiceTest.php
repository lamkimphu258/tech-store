<?php

namespace Tests\Unit\Services;

use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\SalesPromotionRepository;
use App\Http\Services\HomeService;
use Illuminate\Database\Eloquent\Collection;
use Mockery\MockInterface;
use Tests\TestCase;

class HomeServiceTest extends TestCase
{
    public function testGetCategories() {
        $categoryRepository = $this->mock(CategoryRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('findAll')->once()->andReturn();
        });
        $salesPromotionRepository = $this->mock(SalesPromotionRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('getLatest')->andReturn();
        });
        $productRepository = $this->mock(ProductRepository::class, function(MockInterface $mock) {
            $mock->shouldReceive('getBestSeller')->andReturn();
        });

        /** @var CategoryRepository $categoryRepository */
        /** @var SalesPromotionRepository $salesPromotionRepository */
        /** @var ProductRepository $productRepository */
        $homeService = new HomeService(
            $categoryRepository,
            $salesPromotionRepository,
            $productRepository
        );
        $homeService->getCategories();
    }

    public function testGetSalesPromotion() {
        $categoryRepository = $this->mock(CategoryRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('findAll')->andReturn();
        });
        $salesPromotionRepository = $this->mock(SalesPromotionRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('getLatest')->once()->andReturn();
        });
        $productRepository = $this->mock(ProductRepository::class, function(MockInterface $mock) {
            $mock->shouldReceive('getBestSeller')->andReturn();
        });

        /** @var CategoryRepository $categoryRepository */
        /** @var SalesPromotionRepository $salesPromotionRepository */
        /** @var ProductRepository $productRepository */
        $homeService = new HomeService(
            $categoryRepository,
            $salesPromotionRepository,
            $productRepository
        );
        $homeService->getSalesPromotion();
    }

    public function testGetBestSellers() {
        $categoryRepository = $this->mock(CategoryRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('findAll')->andReturn();
        });
        $salesPromotionRepository = $this->mock(SalesPromotionRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('getLatest')->andReturn();
        });
        $productRepository = $this->mock(ProductRepository::class, function(MockInterface $mock) {
            $mock->shouldReceive('getBestSeller')->times(5)->andReturn();
        });

        /** @var CategoryRepository $categoryRepository */
        /** @var SalesPromotionRepository $salesPromotionRepository */
        /** @var ProductRepository $productRepository */
        $homeService = new HomeService(
            $categoryRepository,
            $salesPromotionRepository,
            $productRepository
        );
        $homeService->getBestSellers();
    }
}
