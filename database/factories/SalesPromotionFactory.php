<?php

namespace Database\Factories;

use App\Http\Enums\SalesPromotions\SalesPromotionColumn;
use App\Models\SalesPromotion;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            SalesPromotionColumn::ID => $this->faker->uuid,
            SalesPromotionColumn::SALES_PROMOTION_LINK => $this->faker->sentence,
            SalesPromotionColumn::IMAGE => $this->faker->sentence,
        ];
    }
}
