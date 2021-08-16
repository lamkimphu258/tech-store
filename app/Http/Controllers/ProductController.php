<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {
    }

    public function getProductByCategory(Request $request): Factory|View|Application
    {
        $categoryName = $request->get('category');
        $page = $request->get('page');
        $sort = $request->get('sort');

        $products = $this->productService->getProductByCategory($categoryName, $sort);
        $products->appends(['category' => $categoryName]);

        return view('products-by-category', [
            'products' => $products,
            'categoryName' => $categoryName,
            'page' => $page,
            'sort' => $sort,
        ]);
    }
}
