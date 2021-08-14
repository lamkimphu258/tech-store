<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoryRepository;
use App\Http\Repository\SalesPromotionRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected SalesPromotionRepository $salesPromotionRepository
    ) {
    }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = $this->categoryRepository->findAll();

        $salesPromotion = $this->salesPromotionRepository->getLatest();

        return view('home', [
            'categories' => $categories,
            'salesPromotion' => $salesPromotion
        ]);
    }
}
