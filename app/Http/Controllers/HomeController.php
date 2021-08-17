<?php

namespace App\Http\Controllers;

use App\Http\Services\HomeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
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
