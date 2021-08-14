<?php

namespace Database\Seeders;

use App\Http\Enums\CategoryName;
use App\Http\Repository\CategoryRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
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
        foreach (CategoryName::all() as $category) {
            $this->categoryRepository->save($category);
        }
    }
}
