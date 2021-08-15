<?php

namespace App\Http\Controllers;

use App\Http\Enums\CategoryName;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\SalesPromotionRepository;
use App\Http\Services\HomeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
//        protected CategoryRepository $categoryRepository,
//        protected SalesPromotionRepository $salesPromotionRepository,
//        protected ProductRepository $productRepository

    ) {
    }

    /**
     * @return Factory|View|Application
     */
    public function index(HomeService $homeService): Factory|View|Application
    {
        $categories = $homeService->getCategories();
        $salesPromotion = $homeService->getSalesPromotion();
        $bestSellers = $homeService->getBestSellerProducts();

        return view('home', [
            'categories' => $categories,
            'salesPromotion' => $salesPromotion,
            'bestSellers' => $bestSellers,
        ]);
    }
}
