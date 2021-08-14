<?php

namespace Database\Seeders;

use App\Http\Repository\CategoryRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public const CATEGORIES = ['Smartphones', 'Tablets', 'Laptops', 'PCs', 'Accessories'];

    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::CATEGORIES as $category) {
            $this->categoryRepository->save($category);
        }
    }
}
