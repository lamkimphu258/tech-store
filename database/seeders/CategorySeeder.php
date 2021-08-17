<?php

namespace Database\Seeders;

use App\Http\Enums\Categories\CategoryName;
use App\Http\Repository\CategoryRepository;
use Illuminate\Database\Seeder;

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
