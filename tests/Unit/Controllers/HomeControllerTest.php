<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\HomeController;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\SalesPromotionRepository;
use App\Http\Services\HomeService;
use Mockery\MockInterface;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $homeService = $this->mock(HomeService::class, function(MockInterface $mock) {
            $mock->shouldReceive('getCategories')->once()->andReturn();
            $mock->shouldReceive('getSalesPromotion')->once()->andReturn();
            $mock->shouldReceive('getBestSellers')->once()->andReturn();
        });

        /** @var HomeService $homeService */
        $homeController = new HomeController();
        $response = $homeController->index($homeService);

        $this->assertEquals('home', $response->name());
    }
}
