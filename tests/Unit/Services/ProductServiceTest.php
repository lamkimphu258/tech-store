<?php

namespace Tests\Unit\Services;

use App\Http\Repository\ProductRepository;
use App\Http\Services\ProductService;
use Mockery\MockInterface;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    public function testGetProductByCategory()
    {
        $productRepository = $this->mock(ProductRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('getByCategory')->once()->andReturn();
        });

        /** @var ProductRepository $productRepository */
        $productService = new ProductService($productRepository);
        $productService->getProductByCategory();
    }
}
