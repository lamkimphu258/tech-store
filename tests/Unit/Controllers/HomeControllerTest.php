<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\HomeController;
use App\Http\Repository\CategoryRepository;
use Mockery\MockInterface;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex()
    {
        $categoryRepository = $this->mock(CategoryRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('findAll')->once()->andReturn();
        });

        /** @var CategoryRepository $categoryRepository */
        $homeController = new HomeController($categoryRepository);
        $response = $homeController->index();

        $this->assertEquals('home', $response->name());
    }
}
