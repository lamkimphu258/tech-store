<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\ProductController;
use App\Http\Enums\CategoryName;
use App\Http\Services\ProductService;
use Mockery\MockInterface;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function testGetProductByCategory() {
        $productService = $this->mock(ProductService::class, function(MockInterface $mock){
           $mock->shouldReceive('getProductByCategory')->once()->shouldReturn();
        });

        /** @var ProductService $productService */
        $productController = new ProductController($productService);
        $response = $productController->getProductByCategory(CategoryName::SMARTPHONE);

        $this->assertEquals('productByCategory', $response->name());
    }
}
