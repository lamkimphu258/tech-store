<?php

namespace Database\Seeders;

use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\RateRepository;
use App\Models\Product;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    protected Generator $faker;

    public function __construct(
        protected RateRepository $rateRepository,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository
    ) {
        $this->faker = Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = $this->rateRepository->findAll()->toArray();
        $categories = $this->categoryRepository->findAll()->toArray();

        for ($i = 0; $i <= 1000; $i++) {
            $product = new Product();
            $product->id = $this->faker->uuid;
            $product->name = $this->faker->company;
            $product->thumbnail = $this->faker->sentence;
            $product->quantity_sold = $this->faker->randomDigitNotNull * $this->faker->randomDigitNotNull;
            $product->price = $this->fakeProductPrice();
            $product->debuted_at = $this->faker->dateTimeThisDecade;
            $product->category_id = $this->faker->randomElement($categories)->id;
            $product->rate_id = $this->faker->randomElement($rates)->id;

            $this->productRepository->save($product);
        }
    }

    /**
     * @return float|int
     */
    public function fakeProductPrice(): float|int
    {
        return
            ($this->faker->randomDigit()) * 10_000_000 +
            ($this->faker->randomDigit()) * 1_000_000 +
            ($this->faker->randomDigit()) * 100_000 +
            90_000;
    }
}
