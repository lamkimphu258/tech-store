<?php

namespace Database\Factories;

use App\Models\SalesPromotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SalesPromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesPromotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'salesPromotionLink' => $this->faker->sentence,
            'image' => $this->faker->image,
        ];
    }
}
