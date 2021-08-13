<?php

namespace App\Http\Controllers;

use App\Http\Repository\CategoryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {
    }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = $this->categoryRepository->findAll();

        return view('home', [
            'categories' => $categories,
        ]);
    }
}
