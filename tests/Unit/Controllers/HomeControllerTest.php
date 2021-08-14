<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\HomeController;
use App\Http\Repository\CategoryRepository;
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

        /** @var CategoryRepository $categoryRepository */
        $homeController = new HomeController($categoryRepository, $salesPromotionRepository);
        $response = $homeController->index();

        $this->assertEquals('home', $response->name());
    }
}
