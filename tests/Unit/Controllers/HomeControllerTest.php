<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\HomeController;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\SalesPromotionRepository;
use Mockery\MockInterface;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $categoryRepository = $this->mock(CategoryRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('findAll')->once()->andReturn();
        });

        $salesPromotionRepository = $this->mock(SalesPromotionRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('getLatest')->once()->andReturn();
        });

        $productRepository = $this->mock(ProductRepository::class, function(MockInterface $mock) {
           $mock->shouldReceive('getBestSeller')->times(5)->andReturn();
        });

        /** @var CategoryRepository $categoryRepository */
        /** @var SalesPromotionRepository $salesPromotionRepository */
        /** @var ProductRepository $productRepository */
        $homeController = new HomeController(
            $categoryRepository,
            $salesPromotionRepository,
            $productRepository
        );
        $response = $homeController->index();

        $this->assertEquals('home', $response->name());
    }
}
