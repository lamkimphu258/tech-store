<?php

namespace Database\Seeders;

use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\RateRepository;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function __construct(
        protected RateRepository $rateRepository,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository
    ) {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $rates = $this->rateRepository->findAll()->toArray();
        $categories = $this->categoryRepository->findAll()->toArray();

        for ($i = 0; $i <= 100; $i++) {
            $product = new Product();
            $product->id = $faker->uuid;
            $product->name = $faker->company;
            $product->thumbnail = $faker->sentence;
            $product->quantity_sold = $faker->randomDigitNotNull * $faker->randomDigitNotNull;
            $product->price = 9_999_999;
            $product->category_id = $faker->randomElement($categories)->id;
            $product->rate_id = $faker->randomElement($rates)->id;

            $this->productRepository->save($product);
        }
    }
}
